<?php 
	interface ITransaccion{
		public static function getAll();
		public static function insert($objeto);
		public static function delete($id);
		public static function getObject($campo,$valor,$orden="");		
	}
?>