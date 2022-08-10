<?php

namespace zachsprogramdotorg\models;

use Exception;
use mysqli;

abstract class ZachObject
{
	// ATTRIBUTES (all are dummies/abstract)
	
	public $id;
	
	protected static $fields = ['id'];
	
	protected static $table_name = "zachsobject";
	
	
	
	// METHODS
	/**
	*@return array
	*/
	public function attributes(): array
	    {
	        $attributes = [];

	        foreach (static::$fields as $field) {

	            if (property_exists($this, $field)) {

	                $attributes[$field] = $this->$field;

	            }
	        }
	        return $attributes;
	    }
	    /**
		*@param mysqli $db
		*@return array
	    */
	protected function sanitized_attributes(): array
		    {
				
				global $g;
				
		        $clean_attributes = [];

		        foreach ($this->attributes() as $key => $value) {

		            $clean_attributes[$key] = $g->db->real_escape_string($value);

		        }

		        return $clean_attributes;
		    }
			/**
			*@param array $array
			*@return ZachObject
			*/
	 public static function array_to_object(array $array): ZachObject
		       {
		           $object_in_memory = new static();

		           foreach ($array as $key => $value) {

		               if ($object_in_memory->has_attribute($key)) {

		                   $object_in_memory->$key = $value;

		               }
		           }

		           return $object_in_memory;
		       }
			   /**
			   *@param string $possible_attribute
			   *@return bool
				*/   
	  protected function has_attribute(string $possible_attribute): bool
			       {
			           return array_key_exists($possible_attribute, $this->attributes());
			       }
	  
	  // CRUD (Create Read Update Delete)
	  
	  
	  // Create
	  /**
	  *@param mysqli $db
	  *@param string $error
	  *@return bool
	  */
	  protected function create(): bool
	      {
			  global $g;
			  
	          $num_affected_rows = 0;

	          $insert_id = 0;

	          if ($this->id) {

	              $g->message .= ' ZachObject create() method says: Whichever code is calling create() is trying
	              to insert a new table row using an object which already exists in the table. We know this
	              because that object already has an id. ';

	              return false;

	          }

	          try {
	              // Gets array of this object's attributes

	              $attributes = $this->sanitized_attributes($db);


	              // Pop off the first element

	              $array_keys_array = array_keys($attributes);

	              array_shift($array_keys_array);

	              $array_values_array = array_values($attributes);

	              array_shift($array_values_array);

	              $sql = 'INSERT INTO ' . static::$table_name;
	              $sql .= " (`" . join("`, `", $array_keys_array) . "`) VALUES ('";
	              $sql .= join("', '", $array_values_array) . "')";

	              $g->db->query($sql);

	              $query_error = $g->db->error;

	              if (!empty($query_error)) {

	                  $g->message .= ' The insert failed. The reason given by mysqli is: ' . htmlspecialchars($query_error, ENT_NOQUOTES | ENT_HTML5) . ' ';

	                  return false;
	              }

	              $num_affected_rows = $g->db->affected_rows;

	              $insert_id = $g->db->insert_id;

	          } catch (Exception $e) {

	              $g->message .= ' ZachObject create() caught a thrown exception: ' . htmlspecialchars($e->getMessage(), ENT_NOQUOTES | ENT_HTML5) . ' ';

	              return false;

	          }

	          if ($num_affected_rows) {

	              // Set the id of this object to the insert_id from mysqli.

	              $this->id = $insert_id;

	              return true;

	          } else {

	              $g->message .= ' The ZachObject create() method failed to insert a row. ';

	              return false;

	          }
	      }
		  /**
		   *@param mysqli $db
		   *@param string $error
		   *@param array $objects_array
		   *@return bool
			*/   
		  public static function insert_multiple_objects(array $objects_array): bool
		      {
		          /**
		           * Unlike create() (AFTER it executes) this function will NOT set id field values to the objects.
		           * It is assumed that the objects have unassigned id fields and do NOT exist in the database.
		           * The function returns true on success and false if no objects were inserted.
		           */
				  
				  global $g;

		          $num_affected_rows = 0;

		          $sql = 'INSERT INTO ' . static::$table_name;

		          if (empty($objects_array)) {

		              $g->message .= ' The function insert_multiple_objects did NOT receive any objects to insert. ';

		              return false;

		          }

		          try {
		              /**
		               * I'm going to use the first object
		               * to get the field names and have
		               * them be in the correct order.
		               *
		               * $attributes is an array whose elements
		               * are the attributes of the first object.
		               * The key is the attribute name and the
		               * value is the attribute value.
		               */

		              $attributes = $objects_array[0]->attributes();

		              $array_keys_array = array_keys($attributes);

		              array_shift($array_keys_array);

		              // Now $array_keys_array contains the field names. And they are in correct order.

		              $sql .= " (`" . join("`, `", $array_keys_array) . "`) VALUES ";
		              $sql .= static::value_sets_sql_string($db, $objects_array);

		              $g->db->query($sql);

		              $query_error = $g->$db->error;

		              if (!empty($query_error)) {

		                  $g->message .= ' The insert failed. The reason given by mysqli is: ' . htmlspecialchars($query_error, ENT_NOQUOTES | ENT_HTML5) . ' ';

		                  return false;

		              }

		              $num_affected_rows = $g->db->affected_rows;

		          } catch (Exception $e) {

		              $g->message .= ' ZachObject insert_multiple_objects() caught an exception: ' . htmlspecialchars($e->getMessage(), ENT_NOQUOTES | ENT_HTML5) . ' ';

		              return false;

		          }

		          if ($num_affected_rows) {

		              return true;

		          } else {

		              $g->message .= ' ZachObject insert_multiple_objects() failed to insert any rows. ';

		              return false;

		          }
		      }
	          /**
			  *@param mysqli $db
			  *@param string $error
			  *@return bool
			  */
			  public function save(): bool
			      {
			          // A database object without an id is one that has never been saved in the database.
					  
					  global $g;

			          return isset($this->id) ? $this->update($g->db) : $this->create();
			      }
				  
	// Read
	/**
	*@param mysqli $db
	*@param string $error
	*@return bool|mixed
	*/
	public static function count_all()
	    {
			global $g;
			
	        $sql = "SELECT COUNT(*) FROM " . static::$table_name;

	        try {
	            $result = $g->db->query($sql);

	            $query_error = $g->db->error;

	            if (!empty(trim($query_error))) {

	                $g->message .= ' The count failed. The reason given by mysqli is: ' . $query_error . ' ';

	                return false;

	            }
	        } catch (Exception $e) {

	            $g->message .= ' ZachObject count_all() caught a thrown exception: ' . $e->getMessage() . ' ';

	            return false;

	        }

	        if (!$result->num_rows) {

	            $g->message .= ' count_all failed. ';

	            return false;

	        }

	        $row = $result->fetch_row();

	        return array_shift($row);
	    }
		/**
		*@return array|bool
		*/
	public static function find_all()
		    {
		        return static::find_by_sql("SELECT * FROM " . static::$table_name);
		    }
			/**
			*@param $id
			*@return bool|mixed	
			*/
	public static function find_by_id($id)
			    {
					global $g;
					
			        $result_array = static::find_by_sql("SELECT * FROM " . static::$table_name . "
						WHERE `id`=" . $g->db->real_escape_string((string)$id) . " LIMIT 1");

			        return !empty($result_array) ? array_shift($result_array) : false;
			    }
				
	 /**
     * @param mysqli $db
     * @param string $error
     * @param string $sql
     * @return array|bool
     */
	
	 public static function find_by_sql(string $sql)
	     {
			 global $g;
			 
	         $object_array = [];

	         try {
	             $result = $g->db->query($sql);

	             $query_error = $g->db->error;

	             if (!empty(trim($query_error))) {

	                 $g->message .= ' GoodObject find_by_sql failed. The reason given by mysqli is: ' . htmlspecialchars($query_error, ENT_NOQUOTES | ENT_HTML5) . ' ';

	                 return false;

	             }
	         } catch (Exception $e) {

	             $g->message .= ' GoodObject find_by_sql() caught a thrown exception: ' . htmlspecialchars($e->getMessage(), ENT_NOQUOTES | ENT_HTML5) . ' ';

	             return false;

	         }

	         while ($row = $result->fetch_assoc()) {

	             $object_array[] = static::array_to_object($row);

	         }

	         if (empty($object_array)) {

	             return false;

	         }

	         return $object_array;
	     }
	
	
	// Update
	/**
	*@param mysqli $db
	*@param string $error
	*@return bool
	*/
	protected function update(): bool
	    {
			global $g;
			
	        $num_affected_rows = 0;

	        if ($this->id < 1 || !is_numeric($this->id)) {

	            $g->message .= 'ZachObject update() says: Whichever code is calling this method is trying
	            to update a table row using an object which has a negative or non-numeric id. ';

	            return false;

	        }

	        try {
	            $attributes = $this->sanitized_attributes($db);

	            array_shift($attributes);

	            /*
	             * Sql example for an update:
	             *
	             * UPDATE table
	             * SET column1 = expression1,
	             *     column2 = expression2,
	             *     ...
	             * WHERE conditions;
	             *
	             * UPDATE customers
	             * SET last_name = 'Jefferson'
	             * WHERE customer_id = 800;
	             *
	             */


	            // Create an array of the "column = expression" pairs

	            $attribute_pairs = [];

	            foreach ($attributes as $key => $value) {

	                $attribute_pairs[] = "`{$key}`='{$value}'";

	            }

	            $sql = "UPDATE " . static::$table_name . " SET ";
	            $sql .= join(", ", $attribute_pairs);
	            $sql .= " WHERE `id`=" . $g->db->real_escape_string($this->id) . " LIMIT 1";

	            $g->db->query($sql);

	            $query_error = $g->db->error;

	            if (!empty(trim($query_error))) {

	                $g->message .= ' The update failed. The reason given by mysqli is: ' . htmlspecialchars($query_error, ENT_NOQUOTES | ENT_HTML5) . ' ';

	                return false;
	            }

	            $num_affected_rows = $g->db->affected_rows;

	        } catch (Exception $e) {

	            $g->message .= ' ZachObject update() threw exception: ' . htmlspecialchars($e->getMessage(), ENT_NOQUOTES | ENT_HTML5) . ' ';

	        }

	        if ($num_affected_rows == 1) {

	            return true;

	        } else {

	            $g->message .= ' ZachObject update() FAILED to update its row. ';

	            return false;

	        }
	    }
		
		
		
	// Delete
	  /**
	  *@param mysqli $db
	  *@param string $error
	  *@return bool
	  */
	public function delete(): bool
	    {
			global $g;
			
	        $num_affected_rows = 0;

	        $sql = "DELETE FROM " . static::$table_name . " ";
	        $sql .= "WHERE `id`=" . $g->db->real_escape_string($this->id);
	        $sql .= " LIMIT 1";
			

	        try {
	            $g->db->query($sql);

	            $query_error = $g->db->error;

	            if (!empty(trim($query_error))) {

	                $g->message .= ' The delete failed. The reason given by mysqli is: ' . htmlspecialchars($query_error, ENT_NOQUOTES | ENT_HTML5) . ' ';

	                return false;

	            }

	            $num_affected_rows = $g->db->affected_rows;

	        } catch (Exception $e) {

	            $g->message .= ' ZachObject delete() caught a thrown exception: ' . htmlspecialchars($e->getMessage(), ENT_NOQUOTES | ENT_HTML5) . ' ';

	        }

	        if ($num_affected_rows == 1) {

	            return true;

	        } else {

	            $g->message .= ' ZachObject delete() FAILED to delete a row. ';

	            return false;

	        }
	    }
	}
	
	?>
