<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
  if(isset($_POST['name'])){
    $name=$_POST['name'];
  }
  if(isset($_POST['ph'])){
    $ph=$_POST['ph'];
  }
  if(isset($_POST['mode'])){
    $mode=$_POST['mode'];
    if($mode=="person_pw"||$mode=="corporate_pw"){
      if(isset($_POST['id'])){
        $id=$_POST['id'];
      }
    }
  }
  if($mode=="person_id"){
    $sql="select id from person where name='$name' and phone='$ph'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['id']!="")
    echo $row['id'];
    else{
      echo "가입되지 않은 정보";
    }
  }else if($mode=="corporate_id"){
    $sql="select id from corporate where ceo='$name' and email='$ph'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['id']!="")
    echo $row['id'];
    else{
      echo "가입되지 않은 정보";
    }
  }else if($mode=="person_pw"){
    $sql="select pw from person where name='$name' and phone='$ph' and id='$id'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['pw']!="")
    echo $row['pw'];
    else{
      echo "가입되지 않은 정보";
    }
  }else if($mode=="corporate_pw"){
    $sql="select pw from corporate where ceo='$name' and email='$ph' and id='$id'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['pw']!="")
    echo $row['pw'];
    else{
      echo "가입되지 않은 정보";
    }
  }


 ?>
