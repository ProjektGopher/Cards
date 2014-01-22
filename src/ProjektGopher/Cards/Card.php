<?php namespace ProjektGopher\Cards;

use Exception, Config;

class Card {
	private static $suits = array(
			"s" => "Spade",
			"h" => "Heart",
			"d" => "Diamond",
			"c" => "Club"
		);
	private static $ranks = array(
			"2" => "Deuce",
			"3" => "Three",
			"4" => "Four",
			"5" => "Five",
			"6" => "Six",
			"7" => "Seven",
			"8" => "Eight",
			"9" => "Nine",
			"T" => "Ten",
			"J" => "Jack",
			"Q" => "Queen",
			"K" => "King",
			"A" => "Ace"
		);

	protected static function getCardInfo($card)
	{
		try {
			if(!preg_match("/^([23456789TJQKA])([shdc])$/", $card, $matches)){
				throw new Exception('Bad Card Format');
			}
			return $matches;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	public static function getSuit($card)
	{
		return self::getCardInfo($card)[2];
	}

	public static function getRank($card)
	{
		return self::getCardInfo($card)[1];
	}

	public static function identify($card)
	{
		$cardInfo = self::getCardInfo($card);
		return self::$ranks[$cardInfo[1]] . " of " . self::$suits[$cardInfo[2]] . "s";
	}

	public static function format($card)
	{
		$wrapper = Config::get('cards::wrapper');
		$wrapperClass = Config::get('cards::wrapperClass');
		$cardRank = self::getRank($card);
		$cardSuit = self::getSuit($card);
		$cardSuitClass = strtolower(self::$suits[$cardSuit]);
		$cardSuitIcon = Config::get('cards::icon-' . $cardSuitClass);

		return "<{$wrapper} class='{$wrapperClass} {$cardSuitClass}'>{$cardRank}{$cardSuitIcon}</$wrapper>";
	}
}