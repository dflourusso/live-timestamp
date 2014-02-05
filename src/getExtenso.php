<?php

namespace src;

use DateTime,
    DomainException,
    Exception
    ;

/**
 * Class getExtenso
 * @package src
 */
class getExtenso
{
    /**
     * @param DateTimeBr $date_time_br
     *
     * @return string
     * @throws DomainException
     */
    public static function getContent($date_time_br)
    {
        if (!$date_time_br instanceof DateTime) {
            throw new DomainException('Data inválida!');
        }

        $time = $date_time_br->getTimestamp();
        $diff = time() - $time;
        $a = array(
            'y' => floor($diff / 31536000),
            'm' => floor($diff / 2592000),
            'w' => floor($diff / 604800),
            'd' => floor($diff / 86400),
            'h' => floor($diff / 3600),
            'i' => floor($diff / 60),
            's' => floor($diff),
        );

        foreach ($a as $k => $v) {
            if ($v > 0) {
                return static::getText($k, $v);
            }
        }

        return 'agora';
    }



    /**
     * @param $k
     * @param $v
     *
     * @return string
     * @throws \Exception
     */
    protected static function getText($k, $v)
    {
        switch ($k) {
            case 'y' :
                return static::getTextYear($v);
            case 'm' :
                return static::getTextMonth($v);
            case 'w' :
                return static::getTextWeek($v);
            case 'd' :
                return static::getTextDay($v);
            case 'h' :
                return static::getTextHour($v);
            case 'i' :
                return static::getTextMinute($v);
            case 's' :
                return static::getTextSecond($v);
            default :
                throw new Exception('Chave do getText incorreta!');
        }
    }

    /**
     * @param $v
     *
     * @return string
     */
    protected static function getTextYear($v)
    {
        if (1 == $v) {
            return 'ano passado';
        } else {
            return "há $v anos";
        }
    }

    /**
     * @param $v
     *
     * @return string
     */
    protected static function getTextMonth($v)
    {
        if (1 == $v) {
            return 'mês passado';
        } else {
            return "há $v meses";
        }
    }

    /**
     * @param $v
     *
     * @return string
     */
    protected static function getTextWeek($v)
    {
        if (1 == $v) {
            return 'semana passada';
        } else {
            return "há $v semanas";
        }
    }

    /**
     * @param $v
     *
     * @return string
     */
    protected static function getTextDay($v)
    {
        if (1 == $v) {
            return 'ontem';
        } else {
            return "há $v dias";
        }
    }

    /**
     * @param $v
     *
     * @return string
     */
    protected static function getTextHour($v)
    {
        if (1 == $v) {
            return "há $v hora";
        } else {
            return "há $v horas";
        }
    }

    /**
     * @param $v
     *
     * @return string
     */
    protected static function getTextMinute($v)
    {
        if (1 == $v) {
            return "há $v minuto";
        } else {
            return "há $v minutos";
        }
    }

    /**
     * @param $v
     *
     * @return string
     */
    protected static function getTextSecond($v)
    {
        if (30 < $v) {
            return "a ± 30 segundos";
        } else {
            return "agora";
        }
    }

}
