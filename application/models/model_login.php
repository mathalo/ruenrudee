<?php
public function login($username, $password) {
    $this->db->where('username', $username);
    $this->db->where('password', $this->validate_password($password));
    $query = $this->db->get($this->db->dbprefix . 'member');

    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
}

public function validate_password($password) {
    if (password_verify($password, $this->stored_hash())) {
        return true;
    } else {
        return false;
    }
}

public function stored_hash() {
    $this->db->where('username', $this->input->post('username')); 
    $query = $this->db->get($this->db->dbprefix . 'member');

    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->password;
    } else {
        return false;
    }
}
?>