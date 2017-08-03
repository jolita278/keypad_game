<?php

namespace App\models;

class PlayerGameData extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'player_game_data';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name', 'score', 'time', 'level', 'average_speed'];
}
