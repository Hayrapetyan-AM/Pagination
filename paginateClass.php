<?php
/**
		 * 
		 */
		class Pagination
		{
			private $db;
			private $limit;
			private $offset;
			function __construct($dbConn, $alimit)
			{
				$this->db = $dbConn;
				$this->limit = $alimit;
				self::addButtons();
			}

			public function addButtons()
			{



if (!isset($_GET['pageno']) || $_GET['pageno'] == 0) 
	{
		$_GET['pageno'] = 1;

	}

				?>

		<div class="fixed-bottom">
			<nav aria-label="Page navigation example ">
		  <ul class="pagination ">
		    <li class="page-item"><a class="page-link" href="<? $_SERVER['PHP_SELF'] ?>?pageno=<?echo --$_GET['pageno'] ?>">Previous</a></li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item"><a class="page-link" href="<? $_SERVER['PHP_SELF'] ?>?pageno=<?echo $_GET['pageno']+=2 ?>">Next</a></li>
		  </ul>
		</nav>
		</div>
				<? $offset = ($_GET['pageno']-2) * $this->limit;
					$this->offset = $offset;
			}


		public function Paginate( string $table) 
		{ 

			try {
				$total_query = $this->db->query("SELECT COUNT(*) FROM ".$table."");
				$total_query = $total_query->fetch(PDO::FETCH_ASSOC);
				if ($_GET['pageno'] > ($total_query['COUNT(*)'] / $this->limit)+2) 
				{
					echo '<div class=" container alert alert-danger text-center">There is no content here!</div>';
					//exit(); 
				}
				//echo $_GET['pageno'] . $total_query['COUNT(*)'] . $this->limit;
			} catch (Exception $e) {
				echo "Error ". $e->getMessage();
			}
				


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





		}

 ?>