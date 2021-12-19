<?php
/**
		 * 
		 */
		class Pagination
		{
			private $db;
			private $limit;
			private $offset;
			private $total;
			function __construct($dbConn, $alimit)
			{
				$this->db = $dbConn;
				$this->limit = $alimit;
				self::config();
				self::addButtons();
			}



public function Paginate( string $table) 
		{ 

				try {
					$query = $this->db->query("SELECT * FROM ".$table." LIMIT ".$this->limit." OFFSET ".$this->offset." ");
					while ($row = $query->fetch(PDO::FETCH_OBJ)) 
					{
						print_r($row->task); echo '<br>';
					}
				} catch (Exception $e) {
					echo "Error ". $e->getMessage();
				}
		}




//---------------------------------------------------------------------------------------------------------------------------------------------------------------//



			private function addButtons()
			{



if (!isset($_GET['pageno']) || $_GET['pageno'] == 0) 
	{
		$_GET['pageno'] = 1;

	}

				?>

		<div class="fixed-bottom">
			<nav aria-label="Page navigation example ">
		  <ul class="pagination ">
		  	
		    <li class="page-item"><a class="page-link text-dark" href="<? $_SERVER['PHP_SELF'] ?>?pageno=<?= --$_GET['pageno'] ?>">Previous</a></li>

		  
			<li class="page-item"><a class="page-link text-dark bg-warning" href="<? $_SERVER['PHP_SELF'] ?>?pageno=<?= $_GET['pageno'] ?>"><?= ++$_GET['pageno'];?></a></li>

		    <li class="page-item"><a class="page-link text-dark" href="<? $_SERVER['PHP_SELF'] ?>?pageno=<?= $_GET['pageno']+1 ?>"><?= $_GET['pageno']+1;?></a></li>

		    <li class="page-item"><a class="page-link text-dark" href="<? $_SERVER['PHP_SELF'] ?>?pageno=<?= $_GET['pageno']+2 ?>"><?= $_GET['pageno']+2;?></a></li>

		    <li class="page-item"><a class="page-link text-dark" href="#">...</a></li>

		    <li class="page-item"><a class="page-link text-dark" href="#"><?= $this->total; ?></a></li>

		    <li class="page-item"><a class="page-link text-dark" href="<? $_SERVER['PHP_SELF'] ?>?pageno=<?= $_GET['pageno']+=1 ?>">Next</a></li>

		  </ul>
		</nav>
		</div>
				<? $offset = ($_GET['pageno']-2) * $this->limit;
					$this->offset = $offset;
			}


//---------------------------------------------------------------------------------------------------------------------------------------------------------------//		


		private function config($table = "tasks")
		{
					try {
				$total_query = $this->db->query("SELECT COUNT(*) FROM ".$table."");
				$total_query = $total_query->fetch(PDO::FETCH_ASSOC);
				//echo $_GET['pageno'] . $total_query['COUNT(*)'] . $this->limit;
			} catch (Exception $e) {
				echo "Error ". $e->getMessage();
			}
				$this->total = $total_query['COUNT(*)'];

				if ($_GET['pageno'] > ($total_query['COUNT(*)'] / $this->limit)) 
				{
					echo '<div class=" container alert alert-danger text-center">There is no content here!</div>';
					//exit(); 
				}

		}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------//		
	}
 ?>