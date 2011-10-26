<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Cristi
 * Date: 26.10.2011
 * Time: 23:15
 * To change this template use File | Settings | File Templates.
 */
 class MY_Model extends Model
{


     function create($data)
	{
		$this->db->insert($this->table, $data);

		if ($this->db->affected_rows() === 1)
		{
			return $this->db->insert_id();
		}

		return FALSE;
	}

	//---------------------------------------------------------------


	function update ($id, $data)
	{
		$this->db->where($this->primary_key, $id)
					->update($this->table, $data);

		if ($this->db->affected_rows() === 1)
		{
			return TRUE;
		}

		return FALSE;
	}


	//---------------------------------------------------------------


	function destroy($id)
	{
		$this->db->where($this->primary_key, $id)
					->delete($this->table);

		if ($this->db->affected_rows() === 1)
		{
			return TRUE;
		}

		return FALSE;
	}
 }
