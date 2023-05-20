<?php 
function uploadVideo($direct,$request,$errors=[]){
    $file=$request;
    $file_name=$file['name'];
    $file_type=$file['type'];
    $file_tmp_name=$file['tmp_name'];
    $file_error=$file['error'];
    // $file_size=$file['size'];
    $allowedExtensions=['mp4'];
    if (file_exists($direct)) 
    {
        if ($file_error==0) 
        {
            $file_info=pathinfo($file_name);
            $file_extension=$file_info['extension'];
            if (in_array($file_extension,$allowedExtensions)) {
                
                        $new_file_name=uniqid(" ",true).".".$file_extension;
                        $dest=$direct.$new_file_name;
                        $move=move_uploaded_file($file_tmp_name,$dest);
                        if ($move) {
                            $_SESSION['success']=["Uploaded Successfuly"];
                            $_SESSION['video_name']=$new_file_name;
                        } else {
                            $errors[]="Doesn`t uploaded";
                        }
                        
                
                
            } else {
                $errors[]="Not Allowed Extension ".$file_extension;
            }
            
        }else 
        {
            $errors[]="There is an error happened";
        }
    }else 
    {
        $errors[]="Directory not Found";
    }
    if (empty($errors)) {
        # code...
    } else {
        $_SESSION['errors']=$errors;
    }
    
}

/*1- Valid Extensions -> it exist in file name 
2-validation file size
3-create new name


*/
?>