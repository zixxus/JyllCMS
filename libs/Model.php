<?php
class Model {
	function __construct() {
		$this->db = new Database ();
	}
	public function create_command($param, $preview_code = 0) {
		
		// print_r($param);
		$table = $param ['table'];
		$intoitem = '';
		$intoval = '';
		$exec = '';
		$other = $param ['other'];
		if ($other == null) {
			$other = '';
		}
		if (isset ( $param ['exec'] )) {
			$exec = $param ['exec'];
		}
		$c = 0;
		foreach ( $param ['into'] as $key => $val ) {
			if ($c == 0) {
				$intoitem .= "`" . $key . "`";
				if ($val == 'NULL') {
					
					$intoval .= "" . $val . "";
				} else {
					$intoval .= "'" . $val . "'";
				}
				$c ++;
			} else {
				$intoitem .= ",`" . $key . "`";
				if ($val == 'NULL') {
					
					$intoval .= "," . $val . "";
				} else {
					$intoval .= ",'" . $val . "'";
				}
			}
		}
		$sth = $this->db->prepare ( "INSERT INTO `$table`($intoitem) VALUES ($intoval) $other" );
		if ($preview_code == 1) {
			print_r ( $sth );
			exit ();
		}
		
		$sth->execute ();
		if ($sth->errorInfo ()[2] != null) {
			Jyll::get_error ( 9 );
			exit ();
		}
	}
	public function del_command($param,$preview_code=0) {
            
		// $data = $this->model->fetch_command(array(
		// 'from'=>'items',
		// 'where'=>'1 limit 2',
		// ));
		$select = $param ['select'];
		$from = $param ['from'];
		$where = $param ['where'];
		$sth = $this->db->prepare ( "DELETE FROM `$from` WHERE $where" );
                
		if ($preview_code == 1) {
			print_r ( $sth );
			exit ();
		}
		
		if ($sth->errorInfo ()[2] != null) {
			echo $sth->errorInfo ()[2];
			Jyll::get_error ( 100 );
			exit ();
		}
                
		$sth->execute ();
		
		

		
		return $sth;
	
            
        }
	public function update_command($param, $preview_code = 0) {
		
		// $data = $this->update_command(array(
		// 'table'=>'*',
		// 'set'=>array(),
		// 'where'=>'1 limit 2',
		// ));
		$table = $param ['table'];
		$c = 0;
		foreach ( $param ['set'] as $key => $val ) {
			if ($c == 0) {
				$set .= '`' . $key . '`="' . $val . '"';
				$c ++;
			} else {
				$set .= ',`' . $key . '`="' . $val . '"';
			}
		}
		
		$where = $param ['where'];
		$sth = $this->db->prepare ( "UPDATE `$table` SET $set WHERE $where " );
		if ($preview_code == 1) {
			print_r ( $sth );
			exit ();
		}
		
		$sth->execute ();
		if ($sth->errorInfo ()[2] != null) {
			Jyll::get_error ( 9 );
			exit ();
		}
		return $sth;
	}
	public function fetch_command($param, $preview_code = 0,$allownull=0) {
		// $data = $this->model->fetch_command(array(
		// 'select'=>'*',
		// 'from'=>'items',
		// 'where'=>'1 limit 2',
		// ));
		$select = $param ['select'];
		$from = $param ['from'];
		$where = $param ['where'];
		$sth = $this->db->prepare ( "SELECT $select FROM `$from` WHERE $where" );
		if ($preview_code == 1) {
			print_r ( $sth );
			exit ();
		}
		
                if($allownull == 0){
		if ($sth->errorInfo ()[2] != null) {
			echo $sth->errorInfo ()[2];
			Jyll::get_error ( 9 );
			exit ();
		}
                }
		$sth->execute ();
		
		

		
		return $sth;
	}
	public function relation_command($param, $allownull = 1,$preview_code=0) {
		$from = $param ['from'] . '';
		$where = $param ['where'];
		$c = 0;
		$inner = '';
		foreach ( $param ['inner'] as $key => $value ) {
			if ($c == 0) {
				$inner .= '' . $value . '';
				$c ++;
			} else {
				$inner .= ', ' . $value . '';
			}
		}
		$on = '';
		$c = 0;
		foreach ( $param ['on'] as $key => $value ) {
			if ($c == 0) {
				$on .= '' . $key . '=' . $value . ' ';
				$c ++;
			} else {
				$on .= 'AND ' . $key . '=' . $value . ' ';
			}
		}
		
		if ($param ['group'] != null) {
			
			$group = $param ['group'];
			$sth = $this->db->prepare ( "SELECT * FROM `$from` INNER JOIN ($inner) ON $on GROUP BY $group" );
		} else {
			
			$sth = $this->db->prepare ( "SELECT * FROM `$from` INNER JOIN ($inner) ON $on WHERE $where" );
		}

		if ($preview_code == 1) {
			print_r ( $sth );
			exit ();
		}
		
		$sth->execute ();
	
		if ($sth->errorInfo ()[2] != null) {
			Jyll::get_error ( 9 );
			exit ();
		}
		
		if ($allownull == 0) {
			if ($sth->rowCount () == 0) {
				Jyll::get_error ( 404 );
			} else {
				$data = $sth->fetchAll ( PDO::FETCH_ASSOC );
			}
		} else {
			
			$data = $sth->fetchAll ( PDO::FETCH_ASSOC );
		}
		return $data;
	}
	public function lastid($param) {
		return $this->db->lastInsertId ( $param );
	}
	public function normal_query_all($query,$preview_code=0) {
		$sth = $this->db->prepare ( "$query" );
		

		if ($preview_code == 1) {
			print_r ( $sth );
			exit ();
		}
		
		$sth->execute ();
		if ($sth->errorInfo ()[2] != null) {
			Jyll::get_error ( 9 );
			exit ();
		}
		
		if ($allownull == 0) {
			if ($sth->rowCount () == 0) {
				Jyll::get_error ( 404 );
			} else {
				$data = $sth->fetchAll ( PDO::FETCH_ASSOC );
			}
		} else {
			
			$data = $sth->fetchAll ( PDO::FETCH_ASSOC );
		}
		return $data;
	}
	public function normal_query($query,$preview_code=0) {
		$sth = $this->db->prepare ( "$query" );
		

		if ($preview_code == 1) {
			print_r ( $sth );
			exit ();
		}
		
		$sth->execute ();
		if ($sth->errorInfo ()[2] != null) {
			Jyll::get_error ( 9 );
			exit ();
		}
		
		
		if ($allownull == 0) {
			if ($sth->rowCount () == 0) {
				Jyll::get_error ( 404 );
			} else {
				$data = $sth->fetch ( PDO::FETCH_ASSOC );
			}
		} else {
			
			$data = $sth->fetch ( PDO::FETCH_ASSOC );
		}
		return $data;
	}

	public function relation_command_full($param, $allownull = 1,$preview_code=0) {
		$select = $param['select'];
		if($select == null){
			$select = "*";
		}
		$from = $param ['from'] . '';
		$where = $param ['where'];
		$c = 0;
$build_command = '';
		foreach ( $param ['inner'] as $key => $value ) {
			foreach ($value as $k => $v){
				$build_command .= " INNER JOIN $key ON $k = $v ";
			}
		}
		foreach ( $param ['left'] as $key => $value ) {
			foreach ($value as $k => $v){
				$build_command .= " LEFT JOIN $key ON $k = $v ";
			}
		}
	
		if ($param ['group'] != null) {
				
			$group = $param ['group'];
			$sth = $this->db->prepare ( "SELECT $select FROM `$from` $build_command GROUP BY $group" );
		} else {
				
			$sth = $this->db->prepare ( "SELECT $select FROM `$from` $build_command WHERE $where" );
		}
	
		if ($preview_code == 1) {
			print_r ( $sth );
			exit ();
		}
	
		$sth->execute ();
	
		if ($sth->errorInfo ()[2] != null) {
			Jyll::get_error ( 9 );
			exit ();
		}
	
		if ($allownull == 0) {
			if ($sth->rowCount () == 0) {
				Jyll::get_error ( 404 );
			} else {
				$data = $sth->fetchAll ( PDO::FETCH_ASSOC );
			}
		} else {
				
			$data = $sth->fetchAll ( PDO::FETCH_ASSOC );
		}
		return $data;
	}
}
 