<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 20-Dec-18
 * Time: 12:26
 */

namespace AppBundle\Enum;


abstract class TopicTypeEnum
{

    const DEMAND = "demand";
    const SUPPLY = "supply";
    const QUESTION = "question";


    protected static $topicTypeName = [
        self::DEMAND => "Demand",
        self::SUPPLY => "Supply",
        self::QUESTION => "Question"
    ];

    public static function getTopicTypeName($type)
    {
        if(!isset(static::$topicTypeName[$type])){
            return "Geen type gevonden";
        }

        return static::$topicTypeName[$type];
    }

    public static function getTopicTypes(){
        return [
            self::QUESTION,
            self::DEMAND,
            self::SUPPLY
        ];
    }

}