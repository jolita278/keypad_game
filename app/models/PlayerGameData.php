<?php

namespace App\models;

class PlayerGameData extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'player_game_data';
    protected $hidden = ['count', 'id', 'deleted_at','created_at', 'updated_at'];
    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name', 'score', 'time', 'level', 'average_speed'];
}
