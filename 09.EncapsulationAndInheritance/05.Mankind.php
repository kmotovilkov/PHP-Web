<?php

class Human
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @throws Exception
     */
    private function setFirstName($firstName): void
    {
        if (!ctype_upper($firstName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        } elseif (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @throws Exception
     */
    private function setLastName($lastName): void
    {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }
}

class Student extends Human
{
    private $facultyNumber;

    public function __construct($firstName, $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    /**
     * @return mixed
     */
    public function getFacultyNumber()
    {
        return $this->facultyNumber;
    }

    /**
     * @param mixed $facultyNumber
     * @throws Exception
     */
    private function setFacultyNumber(string $facultyNumber): void
    {
        if (!is_numeric($facultyNumber) || strlen($facultyNumber) > 10 || strlen($facultyNumber) < 5) {
            throw new Exception("Invalid faculty number!");
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        return "First Name: " . $this->getFirstName() . PHP_EOL . "Last Name: " . $this->getLastName() .
            PHP_EOL . "Faculty number: " . $this->getFacultyNumber() . PHP_EOL;
    }

}

class Worker extends Human
{

    private $weekSalary;
    private $workHoursPerDay;

    public function __construct($firstName, $lastName, $weekSalary, $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }

    /**
     * @return mixed
     */
    public function getWeekSalary()
    {
        return $this->weekSalary;
    }

    /**
     * @param mixed $weekSalary
     * @throws Exception
     */
    private function setWeekSalary($weekSalary): void
    {
        if ($weekSalary <= 10) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    /**
     * @return mixed
     */
    public function getWorkHoursPerDay()
    {
        return $this->workHoursPerDay;
    }

    /**
     * @param mixed $workHoursPerDay
     * @throws Exception
     */
    private function setWorkHoursPerDay($workHoursPerDay): void
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHoursPerDay = $workHoursPerDay;
    }

    public function salaryPerHour()
    {
        $daySalary = $this->getWeekSalary() / 7;
        $hoursSalary = $daySalary / $this->getWorkHoursPerDay();
        return $hoursSalary;
    }

    public function __toString()
    {
        $hoursSalary = number_format($this->salaryPerHour(), 2, ".", "");
        $weekSalary = number_format($this->getWeekSalary(), 2, ".", "");
        $workHoursPerDay = number_format($this->getWorkHoursPerDay(), 2, ".", "");

        return "First Name: " . $this->getFirstName() . PHP_EOL . "Last Name: " . $this->getLastName() .
            PHP_EOL . "Week Salary: " . $weekSalary . PHP_EOL . "Hours per day: " .
            $workHoursPerDay . PHP_EOL . "Salary per hour: " . $hoursSalary;
    }
}


list($firstStudentName, $lastStudentName, $facultyNumber) = explode(" ", readline());

list($firstWorkerName, $lastWorkerName, $weekSalary, $workHoursPerDay) = explode(" ", readline());

try {
    $student = new Student($firstStudentName, $lastStudentName, $facultyNumber);
    $worker = new Worker($firstWorkerName, $lastWorkerName, $weekSalary, $workHoursPerDay);
    $weekSalary = floatval($weekSalary);
    $workHoursPerDay = floatval($workHoursPerDay);
    echo $student . PHP_EOL . $worker;
} catch (Exception $ex) {
    echo $ex->getMessage();
}

