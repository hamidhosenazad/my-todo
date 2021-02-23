<?php
namespace MyApp;
require_once realpath("../vendor/autoload.php");
use MyApp\Database;
class Main {
    private $DB;
    public function __construct()
    {
        $db= new Database();
        $this->DB= $db->connect();
    }
    public function insert($data){
        $title= $data['title'];
        if($title){
            $sql="INSERT INTO todos(title) VALUES('$title')";
            $query= mysqli_query($this->DB,$sql);
            if($query===true){
                return 'to do added';
            }
            else{
                return 'to do not added';
            }
        }  
    }
    public function get_all(){
        $sql="SELECT * FROM todos";
        $result=mysqli_query($this->DB,$sql);
            if($result){
            $tr= "";
            while($row=mysqli_fetch_array($result)){
                $tr .="<tr>";
                if($row['status']==='completed'){
                    $tr .="<td><div class='row todo-list'>
                                <div class='col-md-1 complete-icon' id='icon-".$row['id']."'><i class='fa fa-check'></i>
                                </div><div class='col-md-11 list' ><p class='todo-title line-trough' data-title='".$row['title']."' id=".$row['id'].">".$row['title']."</p></div></div></td>";
                }
                else{
                    $tr .="<td><div class='row todo-list'>
                                <div class='col-md-1 complete-icon' id='icon-".$row['id']."'>
                                </div><div class='col-md-11 list' ><p class='todo-title' data-title='".$row['title']."' id=".$row['id'].">".$row['title']."</p></div></div></td>";
                } 
                
                $tr .="</tr>";
            }
            echo $tr;
        }
        else{
            echo false;
        }
    }
    public function edit($data){
        $id=$data['id'];
        $title=$data['title'];
        $sql="UPDATE todos SET title='$title' WHERE id='$id'";
        $query=mysqli_query($this->DB,$sql);
          if($query===true){
              echo "to do edited";
          }
          else{
              echo 'to do not edited';
           }
    }
    public function update($data){
        $id=$data['id'];
        $sql="UPDATE todos SET status='completed' WHERE id='$id'";
        $query=mysqli_query($this->DB,$sql);
          if($query===true){
              echo "to do status updated";
          }
          else{
              echo 'to do status not updated';
           }
    }
    public function row_count(){
        $sql="SELECT * FROM todos WHERE status = 'pending'";
        $query=mysqli_query($this->DB,$sql);
        echo $query->num_rows; 
    }
    public function delete(){
        $sql="DELETE  FROM todos WHERE status = 'completed'";
        $query=mysqli_query($this->DB,$sql);
        var_dump($query);
    }
    public function get_active(){
        $sql="SELECT * FROM todos WHERE status = 'pending'";
        $result=mysqli_query($this->DB,$sql);
        $tr= "";
        while($row=mysqli_fetch_array($result)){
            $tr .="<tr>";
            
            $tr .="<td><div class='row todo-list'>
                            <div class='col-md-1 complete-icon' id='icon-".$row['id']."'>
                            </div><div class='col-md-11 list' ><p class='todo-title' data-title='".$row['title']."' id=".$row['id'].">".$row['title']."</p></div></div></td>";
             
            
            $tr .="</tr>";
        }
        echo $tr;
    }
    public function get_completed(){
        $sql="SELECT * FROM todos WHERE status = 'completed'";
        $result=mysqli_query($this->DB,$sql);
        $tr= "";
        while($row=mysqli_fetch_array($result)){
            $tr .="<tr>";
            
            $tr .="<td><div class='row todo-list'>
                            <div class='col-md-1 complete-icon' id='icon-".$row['id']."'><i class='fa fa-check'></i>
                            </div><div class='col-md-11 list' ><p class='todo-title line-trough' data-title='".$row['title']."' id=".$row['id'].">".$row['title']."</p></div></div></td>";
             
            
            $tr .="</tr>";
        }
        echo $tr;
    }
}
$main= new Main();
if($_POST){
    if($_POST['action']==='insert'){
        $main->insert($_POST);
    }
    elseif($_POST['action']==='edit'){
        $main->edit($_POST);
    }
    elseif($_POST['action']==='update_todo'){
        $main->update($_POST);
    }
}
if($_GET){
    if($_GET['action']==='get_all'){
        $main->get_all();
    }
    elseif($_GET['action']==='row_count'){
        $main->row_count();
    }
    elseif($_GET['action']==='delete_todo'){
        $main->delete();
    }
    elseif($_GET['action']==='get_acitve'){
        $main->get_active();
    }
    elseif($_GET['action']==='get_completed'){
        $main->get_completed();
    }
}

