<?php


class Book
{
    private $title;
    private $author;
    private $price;

    public function __construct($title, $author, $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @throws Exception
     */
    private function setTitle($title): void
    {
        if (strlen($title) < 3) {
            throw new Exception("Title not valid!");
        }
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {

        return $this->author;
    }

    /**
     * @param mixed $author
     * @throws Exception
     */
    private function setAuthor($author): void
    {
        $name = explode(" ", $author)[1][0];
        if (is_numeric($name)) {
            throw new Exception("Author not valid!");
        }
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @throws Exception
     */
    private function setPrice($price): void
    {
        if ($price <= 0) {
            throw new Exception("Price not valid!");
        }
        $this->price = $price;
    }

}

class GoldenEditionBook extends Book
{
    public function goldenPrice()
    {
        return parent::getPrice() * 1.3;
    }
}


$author = readline();
$title = readline();
$price = floatval(readline());
$type = readline();


$book = null;
try {
    if ($type == "STANDARD") {
        $book = new Book($title, $author, $price);
        echo "OK" . PHP_EOL . $book->getPrice();
    } elseif ($type == "GOLD") {
        $book = new GoldenEditionBook($title, $author, $price);
        echo "OK" . PHP_EOL . $book->goldenPrice();
    } else {
        throw new Exception("Type is not valid!");
    }


} catch (Exception $e) {
    echo $e->getMessage();
}
