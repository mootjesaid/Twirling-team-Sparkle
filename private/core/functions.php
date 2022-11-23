<?php

function get_var($key, $default = "")
{
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }

    return $default;
}

function get_select($key, $value)
{
    if(isset($_POST[$key]))
    {
        if($_POST[$key] == $value)
        {
            return "selected";
        }
    }
    return "";
}

function esc($var)
{
    return htmlspecialchars($var);
}

function get_date($date)
{
    return date("Y-m-d",strtotime($date));
}


function get_image($image)
{
	if(!file_exists($image)){
        $image = ASSETS.'/avatar-placeholder.png';

    }else
    {

        $image = ROOT . "/" . $image;
    }

 	return $image;
}

function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function addImage()
{
    $allowed[] = "image/jpeg";
    $allowed[] = "image/png";

    if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {
        $folder = "uploads";
        if (!file_exists($folder)) {
            mkdir($folder);
        }
        $uniquesavename = time() . uniqid(rand());
        $destination = $folder . "/" . $uniquesavename . '.png';;
        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        $_POST['image'] = $destination;

    }
}




