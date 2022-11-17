<?php
//get all class
function getAllClass($db)
{
$sql = 'Select c.id, c.class_name, c.teacher_name, c.no_phone, c.position, c.subject_name from class c ';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//get class by id
function getClass($db, $classId)
{
$sql = 'Select c.id, c.class_name, c.teacher_name, c.no_phone, c.position, c.subject_name from class c';
$sql .= 'Where c.id = :id';
$stmt = $db->prepare ($sql);
$id = (int) $classId;
$stmt->bindParam(':id', $classId, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

///////////////////////////////////////////////////////////////////////////

function createClass($db, $form_data)
{
    $sql = 'Insert into class (id, class_name, teacher_name, no_phone, position, subject_name) ';
    $sql .= 'values (:id, :class_name, :teacher_name, :no_phone, :position, :subject_name )';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':id', $form_data['id']);
    $stmt->bindParam(':class_name', $form_data['class_name']);
    $stmt->bindParam(':teacher_name', $form_data['teacher_name']);
    $stmt->bindParam(':no_phone', $form_data['no_phone']);
    $stmt->bindParam(':position', $form_data['position']);
    $stmt->bindParam(':subject_name', $form_data['subject_name']);
    $stmt->execute();
    return $db->lastInsertID();
    //insert last number.. continue
}
///////////////////////////////////////////////////////////////////////////////

//delete product by id
function deleteClass($db,$classId) 
{
$sql = ' Delete from class where id = :id';
$stmt = $db->prepare($sql);
$id = (int)$classId;
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
}


////////////////////////////////////////////////////////////////////////////////

//update product by id
function updateClass($db,$form_dat,$classId,$date) 
{
    $sql = 'UPDATE class SET id = :id , class_name = :class_name , teacher_name = :teacher_name , no_phone = :no_phone, position=:position, subject_name=:subject_name';
    $sql .=' WHERE id = :id';
    
    $stmt = $db->prepare ($sql);
    $id = (int)$classId;
    $mod = $date;
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':class_name', $form_dat['class_name']);
    $stmt->bindParam(':teacher_name', $form_dat['teacher_name']);
    $stmt->bindParam(':no_phone', $form_dat['no_phone']);
    $stmt->bindParam(':position', $form_dat['position']);
    $stmt->bindParam(':subject_name', $form_dat['subject_name']);
    $stmt->execute();
}