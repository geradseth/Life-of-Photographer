<?php
interface iLogin{
	public function checkMembership();
	public function setMnp($username, $password);
	public function getMemberId();
	public function member_session();
	public function admin_session();
	public function admin_logout();
	public function member_logout();
	public function getAdmin();
}