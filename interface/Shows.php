<?php
interface ishows{
	public function getEvents();
	public function getUpcomingEvent();
	public function getHeadline($etid = 1);
	public function getFeaturedPhoto();
}
?>