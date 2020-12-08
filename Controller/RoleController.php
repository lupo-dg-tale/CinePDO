<?php

Class RoleController 
{
    public function findAll()
    {
        $dao = new DAO();
        $sql = "SELECT nom_role FROM role ";
        $roles = $dao->executerRequete($sql);

        require "View/role/listRoles.php";
    }   
}