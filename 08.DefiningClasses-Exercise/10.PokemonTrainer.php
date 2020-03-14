10<?php

class Trainer
{
    private $name;
    private $badges;
    private $pokemons;

    /**
     * Trainer constructor.
     * @param $name
     * @param $badges
     * @param $pokemons
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->badges = 0;
        $this->pokemons = [];
    }

    public function catchPokemon(Pokemon $pokemon)
    {
        $this->pokemons[$pokemon->getElement()][] = $pokemon;
    }

    public function receiveBadge()
    {
        $this->badges++;
    }

    public function hasPokemonsByElement($element)
    {
        return key_exists($element, $this->pokemons) &&
            count($this->pokemons[$element]) > 0;
    }

    public function hitPokemons($dmg)
    {
        foreach ($this->pokemons as $type => $pokemonsByType) {
            foreach ($pokemonsByType as $key => $pokemon) {
                $pokemon->hit($dmg);
                if (!$pokemon->isAlive()) {
                    unset($this->pokemons[$type][$key]);
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getBadges(): int
    {
        return $this->badges;
    }

    public function __toString()
    {
        $pokemonCount = 0;
        foreach ($this->pokemons as $pokemonsByType) {
            $pokemonCount += count($pokemonsByType);
        }
        return $this->name . " " . $this->badges . " " . $pokemonCount;
    }
}

class Pokemon
{
    private $name;
    private $element;
    private $health;

    /**
     * Pokemon constructor.
     * @param $name
     * @param $element
     * @param $health
     */
    public function __construct($name, $element, $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    public function isAlive()
    {
        return $this->getHealth() > 0;
    }

    public function hit($dmg)
    {
        $this->health -= max(0, $dmg);

    }
}

/** @var  Trainer[] $trainers */
$trainers = [];
$line = readline();
while ($line != "Tournament") {

    list($trainerName, $pokemonName, $element, $health) = explode(" ", $line);
    if (!key_exists($trainerName, $trainers)) {
        $trainers[$trainerName] = new Trainer($trainerName);
    }
    $trainer = $trainers[$trainerName];
    $trainer->catchPokemon(new Pokemon($pokemonName, $element, $health));

    $line = readline();
}

$line = readline();
while ($line != "End") {
    foreach ($trainers as $trainer) {
        if ($trainer->hasPokemonsByElement($line)) {
            $trainer->receiveBadge();
        } else {
            $trainer->hitPokemons(10);
        }
    }
    $line = readline();
}

uksort($trainers, function ($key1, $key2) use ($trainers) {
    $trainer1 = $trainers[$key1];
    $trainer2 = $trainers[$key2];

    return $trainer2->getBadges() <=> $trainer1->getBadges();
});

echo implode(PHP_EOL, $trainers);
