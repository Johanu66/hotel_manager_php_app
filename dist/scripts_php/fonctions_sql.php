<?php

/*
function insert1 (table,col1,data1) {
    $query = "
      INSERT INTO table (col1) 
      VALUES (:data1)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   data1
        )
    );
    $result = $statement->fetchAll();
    $check_insert1 = '';
    if(isset($result))
    {
        $check_insert1 = 'good';
    }else {
        $check_insert1 = 'bad';
    }
}

function update1 (table,colcond,datacond,col1,data1) {
    $query = "
      UPDATE table set col1 = :data1 
      WHERE colcond = :datacond
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   data1,
            ':datacond' =>   datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update1 = '';
    if(isset($result))
    {
        $check_update1 = 'good';
    }else {
        $check_update1 = 'bad';
    }
}
*/

function update1($table,$colcond,$datacond,$col1,$data1) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update1 = '';
    if(isset($result))
    {
        $check_update1 = 'good';
    }else {
        $check_update1 = 'bad';
    }
}


function delete($table,$colcond,$datacond) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      DELETE FROM $table 
      WHERE $colcond = :datacond 
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':datacond' => $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_delete1 = '';
    if(isset($result))
    {
        $check_delete1 = 'good';
    }else {
        $check_delete1 = 'bad';
    }
}


function insert2 ($table,$col1,$data1,$col2,$data2) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2) 
      VALUES (:data1,:data2)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2
        )
    );

    $result = $statement->fetchAll();

    $check_insert2 = '';
    if(isset($result))
    {
        $check_insert2 = 'good';
    }else {
        $check_insert2 = 'bad';
    }

    //return $check_insert2;

}

function update2($table,$colcond,$datacond,$col1,$data1,$col2,$data2) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update2 = '';
    if(isset($result))
    {
        $check_update2 = 'good';
    }else {
        $check_update2 = 'bad';
    }
}

function insert3 ($table,$col1,$data1,$col2,$data2,$col3,$data3) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3) 
      VALUES (:data1,:data2,:data3)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3
        )
    );

    $result = $statement->fetchAll();

    $check_insert3 = '';
    if(isset($result))
    {
        $check_insert3 = 'good';
    }else {
        $check_insert3 = 'bad';
    }

    //return $check_insert2;

}

function insert4 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4) 
      VALUES (:data1,:data2,:data3,:data4)
    ";

    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4
        )
    );
    $result = $statement->fetchAll();

    $check_insert5 = '';
    if(isset($result))
    {
        $check_insert5 = 'good';
    }else {
        $check_insert5 = 'bad';
    }

    //return $check_insert4;

}

function insert5 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5) 
      VALUES (:data1,:data2,:data3,:data4,:data5)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4,
            ':data5' =>   $data5
        )
    );

    $result = $statement->fetchAll();

    $check_insert5 = '';
    if(isset($result))
    {
        $check_insert5 = 'good';
    }else {
        $check_insert5 = 'bad';
    }

    //return $check_insert5;

}

function insert6 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4,
            ':data5' =>   $data5,
            ':data6' =>   $data6
        )
    );

    $result = $statement->fetchAll();

    $check_insert6 = '';
    if(isset($result))
    {
        $check_insert6 = 'good';
    }else {
        $check_insert6 = 'bad';
    }

    //return $check_insert5;

}


function insert7 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4,
            ':data5' =>   $data5,
            ':data6' =>   $data6,
            ':data7' =>   $data7
        )
    );

    $result = $statement->fetchAll();

    $check_insert7 = '';
    if(isset($result))
    {
        $check_insert7 = 'good';
    }else {
        $check_insert7 = 'bad';
    }

    //return $check_insert7;

}


function insert8 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4,
            ':data5' =>   $data5,
            ':data6' =>   $data6,
            ':data7' =>   $data7,
            ':data8' =>   $data8
        )
    );

    $result = $statement->fetchAll();

    $check_insert8 = '';
    if(isset($result))
    {
        $check_insert8 = 'good';
    }else {
        $check_insert8 = 'bad';
    }

    //return $check_insert8;

}


function insert9 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4,
            ':data5' =>   $data5,
            ':data6' =>   $data6,
            ':data7' =>   $data7,
            ':data8' =>   $data8,
            ':data9' =>   $data9
        )
    );

    $result = $statement->fetchAll();

    $check_insert11 = '';
    if(isset($result))
    {
        $check_insert11 = 'good';
    }else {
        $check_insert11 = 'bad';
    }

    //return $check_insert11;

}


function insert10 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4,
            ':data5' =>   $data5,
            ':data6' =>   $data6,
            ':data7' =>   $data7,
            ':data8' =>   $data8,
            ':data9' =>   $data9,
            ':data10' =>   $data10
        )
    );

    $result = $statement->fetchAll();

    $check_insert11 = '';
    if(isset($result))
    {
        $check_insert11 = 'good';
    }else {
        $check_insert11 = 'bad';
    }

    //return $check_insert11;

}


function insert11 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4,
            ':data5' =>   $data5,
            ':data6' =>   $data6,
            ':data7' =>   $data7,
            ':data8' =>   $data8,
            ':data9' =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11
        )
    );

    $result = $statement->fetchAll();

    $check_insert11 = '';
    if(isset($result))
    {
        $check_insert11 = 'good';
    }else {
        $check_insert11 = 'bad';
    }

    //return $check_insert11;

}


function insert12 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12) {
$connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
$connect->exec('SET NAMES utf8');

$query = "
  INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12) 
  VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12)
";

$statement = $connect->prepare($query);
$statement->execute(
    array(
        ':data1' =>   $data1,
        ':data2' =>   $data2,
        ':data3' =>   $data3,
        ':data4' =>   $data4,
        ':data5' =>   $data5,
        ':data6' =>   $data6,
        ':data7' =>   $data7,
        ':data8' =>   $data8,
        ':data9' =>   $data9,
        ':data10' =>   $data10,
        ':data11' =>   $data11,
        ':data12' =>   $data12
    )
);

$result = $statement->fetchAll();

$check_insert11 = '';
if(isset($result))
{
    $check_insert11 = 'good';
}else {
    $check_insert11 = 'bad';
}

//return $check_insert11;

}


function insert13 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13) {
$connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
$connect->exec('SET NAMES utf8');

$query = "
  INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13) 
  VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13)
";

$statement = $connect->prepare($query);
$statement->execute(
    array(
        ':data1' =>   $data1,
        ':data2' =>   $data2,
        ':data3' =>   $data3,
        ':data4' =>   $data4,
        ':data5' =>   $data5,
        ':data6' =>   $data6,
        ':data7' =>   $data7,
        ':data8' =>   $data8,
        ':data9' =>   $data9,
        ':data10' =>   $data10,
        ':data11' =>   $data11,
        ':data12' =>   $data12,
        ':data13' =>   $data13
    )
);

$result = $statement->fetchAll();

$check_insert11 = '';
if(isset($result))
{
    $check_insert11 = 'good';
}else {
    $check_insert11 = 'bad';
}

//return $check_insert11;

}





function insert18 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18) {
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2,
            ':data3' =>   $data3,
            ':data4' =>   $data4,
            ':data5' =>   $data5,
            ':data6' =>   $data6,
            ':data7' =>   $data7,
            ':data8' =>   $data8,
            ':data9' =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18
        )
    );

    $result = $statement->fetchAll();

    $check_insert18 = '';
    if(isset($result))
    {
        $check_insert18 = 'good';
    }else {
        $check_insert18 = 'bad';
    }

    //return $check_insert18;

}


function insert20 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20
        )
    );

    $result = $statement->fetchAll();

    $check_insert20 = '';
    if(isset($result))
    {
        $check_insert20 = 'good';
    }else {
        $check_insert20 = 'bad';
    }

    //return $check_insert20;
}



function insert21 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20,$col21) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20,:data21)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20,
            ':data21' =>   $data21
        )
    );

    $result = $statement->fetchAll();

    $check_insert21 = '';
    if(isset($result))
    {
        $check_insert21 = 'good';
    }else {
        $check_insert21 = 'bad';
    }

    //return $check_insert21;
}


function insert23 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20,$col21,$col22,$col23) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20,:data21,:data22,:data23)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20,
            ':data21' =>   $data21,
            ':data22' =>   $data22,
            ':data23' =>   $data23
        )
    );

    $result = $statement->fetchAll();

    $check_insert23 = '';
    if(isset($result))
    {
        $check_insert23 = 'good';
    }else {
        $check_insert23 = 'bad';
    }

    //return $check_insert23;
}



function insert24 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23,$col24,$data24)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20,$col21,$col22,$col23,$col24) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20,:data21,:data22,:data23,:data24)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20,
            ':data21' =>   $data21,
            ':data22' =>   $data22,
            ':data23' =>   $data23,
            ':data24' =>   $data24
        )
    );

    $result = $statement->fetchAll();

    $check_insert24 = '';
    if(isset($result))
    {
        $check_insert24 = 'good';
    }else {
        $check_insert24 = 'bad';
    }

    //return $check_insert24;
}


function insert28 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23,$col24,$data24,$col25,$data25,$col26,$data26,$col27,$data27,$col28,$data28)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20,$col21,$col22,$col23,$col24,$col25,$col26,$col27,$col28) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20,:data21,:data22,:data23,:data24,:data25,:data26,:data27,:data28)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20,
            ':data21' =>   $data21,
            ':data22' =>   $data22,
            ':data23' =>   $data23,
            ':data24' =>   $data24,
            ':data25' =>   $data25,
            ':data26' =>   $data26,
            ':data27' =>   $data27,
            ':data28' =>   $data28
        )
    );

    $result = $statement->fetchAll();

    $check_insert28 = '';
    if(isset($result))
    {
        $check_insert28 = 'good';
    }else {
        $check_insert28 = 'bad';
    }

    //return $check_insert28;
}


function insert32 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23,$col24,$data24,$col25,$data25,$col26,$data26,$col27,$data27,$col28,$data28,$col29,$data29,$col30,$data30,$col31,$data31,$col32,$data32)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20,$col21,$col22,$col23,$col24,$col25,$col26,$col27,$col28,$col29,$col30,$col31,$col32) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20,:data21,:data22,:data23,:data24,:data25,:data26,:data27,:data28,:data29,:data30,:data31,:data32)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20,
            ':data21' =>   $data21,
            ':data22' =>   $data22,
            ':data23' =>   $data23,
            ':data24' =>   $data24,
            ':data25' =>   $data25,
            ':data26' =>   $data26,
            ':data27' =>   $data27,
            ':data28' =>   $data28,
            ':data29' =>   $data29,
            ':data30' =>   $data30,
            ':data31' =>   $data31,
            ':data32' =>   $data32
        )
    );

    $result = $statement->fetchAll();

    $check_insert32 = '';
    if(isset($result))
    {
        $check_insert32 = 'good';
    }else {
        $check_insert32 = 'bad';
    }

    //return $check_insert32;
}


function insert43 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23,$col24,$data24,$col25,$data25,$col26,$data26,$col27,$data27,$col28,$data28,$col29,$data29,$col30,$data30,$col31,$data31,$col32,$data32,$col33,$data33,$col34,$data34,$col35,$data35,$col36,$data36,$col37,$data37,$col38,$data38,$col39,$data39,$col40,$data40,$col41,$data41,$col42,$data42,$col43,$data43)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20,$col21,$col22,$col23,$col24,$col25,$col26,$col27,$col28,$col29,$col30,$col31,$col32,$col33,$col34,$col35,$col36,$col37,$col38,$col39,$col40,$col41,$col42,$col43) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20,:data21,:data22,:data23,:data24,:data25,:data26,:data27,:data28,:data29,:data30,:data31,:data32,:data33,:data34,:data35,:data36,:data37,:data38,:data39,:data40,:data41,:data42,:data43)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20,
            ':data21' =>   $data21,
            ':data22' =>   $data22,
            ':data23' =>   $data23,
            ':data24' =>   $data24,
            ':data25' =>   $data25,
            ':data26' =>   $data26,
            ':data27' =>   $data27,
            ':data28' =>   $data28,
            ':data29' =>   $data29,
            ':data30' =>   $data30,
            ':data31' =>   $data31,
            ':data32' =>   $data32,
            ':data33' =>   $data33,
            ':data34' =>   $data34,
            ':data35' =>   $data35,
            ':data36' =>   $data36,
            ':data37' =>   $data37,
            ':data38' =>   $data38,
            ':data39' =>   $data39,
            ':data40' =>   $data40,
            ':data41' =>   $data41,
            ':data42' =>   $data42,
            ':data43' =>   $data43
        )
    );

    $result = $statement->fetchAll();

    $check_insert43 = '';
    if(isset($result))
    {
        $check_insert43 = 'good';
    }else {
        $check_insert43 = 'bad';
    }

    //return $check_insert43;
}


function insert47 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23,$col24,$data24,$col25,$data25,$col26,$data26,$col27,$data27,$col28,$data28,$col29,$data29,$col30,$data30,$col31,$data31,$col32,$data32,$col33,$data33,$col34,$data34,$col35,$data35,$col36,$data36,$col37,$data37,$col38,$data38,$col39,$data39,$col40,$data40,$col41,$data41,$col42,$data42,$col43,$data43,$col44,$data44,$col45,$data45,$col46,$data46,$col47,$data47)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20,$col21,$col22,$col23,$col24,$col25,$col26,$col27,$col28,$col29,$col30,$col31,$col32,$col33,$col34,$col35,$col36,$col37,$col38,$col39,$col40,$col41,$col42,$col43,$col44,$col45,$col46,$col47) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20,:data21,:data22,:data23,:data24,:data25,:data26,:data27,:data28,:data29,:data30,:data31,:data32,:data33,:data34,:data35,:data36,:data37,:data38,:data39,:data40,:data41,:data42,:data43,:data44,:data45,:data46,:data47)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20,
            ':data21' =>   $data21,
            ':data22' =>   $data22,
            ':data23' =>   $data23,
            ':data24' =>   $data24,
            ':data25' =>   $data25,
            ':data26' =>   $data26,
            ':data27' =>   $data27,
            ':data28' =>   $data28,
            ':data29' =>   $data29,
            ':data30' =>   $data30,
            ':data31' =>   $data31,
            ':data32' =>   $data32,
            ':data33' =>   $data33,
            ':data34' =>   $data34,
            ':data35' =>   $data35,
            ':data36' =>   $data36,
            ':data37' =>   $data37,
            ':data38' =>   $data38,
            ':data39' =>   $data39,
            ':data40' =>   $data40,
            ':data41' =>   $data41,
            ':data42' =>   $data42,
            ':data43' =>   $data43,
            ':data44' =>   $data44,
            ':data45' =>   $data45,
            ':data46' =>   $data46,
            ':data47' =>   $data47
        )
    );

    $result = $statement->fetchAll();

    $check_insert47 = '';
    if(isset($result))
    {
        $check_insert47 = 'good';
    }else {
        $check_insert47 = 'bad';
    }

    //return $check_insert47;
}


function insert48 ($table,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23,$col24,$data24,$col25,$data25,$col26,$data26,$col27,$data27,$col28,$data28,$col29,$data29,$col30,$data30,$col31,$data31,$col32,$data32,$col33,$data33,$col34,$data34,$col35,$data35,$col36,$data36,$col37,$data37,$col38,$data38,$col39,$data39,$col40,$data40,$col41,$data41,$col42,$data42,$col43,$data43,$col44,$data44,$col45,$data45,$col46,$data46,$col47,$data47,$col48,$data48)
{
    $connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $connect->exec('SET NAMES utf8');

    $query = "
      INSERT INTO $table ($col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10,$col11,$col12,$col13,$col14,$col15,$col16,$col17,$col18,$col19,$col20,$col21,$col22,$col23,$col24,$col25,$col26,$col27,$col28,$col29,$col30,$col31,$col32,$col33,$col34,$col35,$col36,$col37,$col38,$col39,$col40,$col41,$col42,$col43,$col44,$col45,$col46,$col47,$col48) 
      VALUES (:data1,:data2,:data3,:data4,:data5,:data6,:data7,:data8,:data9,:data10,:data11,:data12,:data13,:data14,:data15,:data16,:data17,:data18,:data19,:data20,:data21,:data22,:data23,:data24,:data25,:data26,:data27,:data28,:data29,:data30,:data31,:data32,:data33,:data34,:data35,:data36,:data37,:data38,:data39,:data40,:data41,:data42,:data43,:data44,:data45,:data46,:data47,:data48)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'  =>   $data1,
            ':data2'  =>   $data2,
            ':data3'  =>   $data3,
            ':data4'  =>   $data4,
            ':data5'  =>   $data5,
            ':data6'  =>   $data6,
            ':data7'  =>   $data7,
            ':data8'  =>   $data8,
            ':data9'  =>   $data9,
            ':data10' =>   $data10,
            ':data11' =>   $data11,
            ':data12' =>   $data12,
            ':data13' =>   $data13,
            ':data14' =>   $data14,
            ':data15' =>   $data15,
            ':data16' =>   $data16,
            ':data17' =>   $data17,
            ':data18' =>   $data18,
            ':data19' =>   $data19,
            ':data20' =>   $data20,
            ':data21' =>   $data21,
            ':data22' =>   $data22,
            ':data23' =>   $data23,
            ':data24' =>   $data24,
            ':data25' =>   $data25,
            ':data26' =>   $data26,
            ':data27' =>   $data27,
            ':data28' =>   $data28,
            ':data29' =>   $data29,
            ':data30' =>   $data30,
            ':data31' =>   $data31,
            ':data32' =>   $data32,
            ':data33' =>   $data33,
            ':data34' =>   $data34,
            ':data35' =>   $data35,
            ':data36' =>   $data36,
            ':data37' =>   $data37,
            ':data38' =>   $data38,
            ':data39' =>   $data39,
            ':data40' =>   $data40,
            ':data41' =>   $data41,
            ':data42' =>   $data42,
            ':data43' =>   $data43,
            ':data44' =>   $data44,
            ':data45' =>   $data45,
            ':data46' =>   $data46,
            ':data47' =>   $data47,
            ':data48' =>   $data48
        )
    );

    $result = $statement->fetchAll();

    $check_insert48 = '';
    if(isset($result))
    {
        $check_insert48 = 'good';
    }else {
        $check_insert48 = 'bad';
    }

    //return $check_insert48;
}


function update3($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':data3'    =>   $data3,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update3 = '';
    if(isset($result))
    {
        $check_update3 = 'good';
    }else {
        $check_update3 = 'bad';
    }
}


function update4($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':data3'    =>   $data3,
            ':data4'    =>   $data4,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update3 = '';
    if(isset($result))
    {
        $check_update3 = 'good';
    }else {
        $check_update3 = 'bad';
    }
}


function update5($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4, $col5 = :data5 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':data3'    =>   $data3,
            ':data4'    =>   $data4,
            ':data5'    =>   $data5,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update3 = '';
    if(isset($result))
    {
        $check_update3 = 'good';
    }else {
        $check_update3 = 'bad';
    }
}


function update6($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4, $col5 = :data5, $col6 = :data6 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':data3'    =>   $data3,
            ':data4'    =>   $data4,
            ':data5'    =>   $data5,
            ':data6'    =>   $data6,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update3 = '';
    if(isset($result))
    {
        $check_update3 = 'good';
    }else {
        $check_update3 = 'bad';
    }
}

function update8($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8) {
$conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
$conx->exec('SET NAMES utf8');

$query = "
  UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4, $col5 = :data5, $col6 = :data6, $col7 = :data7, $col8 = :data8
  WHERE $colcond = :datacond
";

$statement = $conx->prepare($query);
$statement->execute(
    array(
        ':data1'    =>   $data1,
        ':data2'    =>   $data2,
        ':data3'    =>   $data3,
        ':data4'    =>   $data4,
        ':data5'    =>   $data5,
        ':data6'    =>   $data6,
        ':data7'    =>   $data7,
        ':data8'    =>   $data8,
        ':datacond' =>   $datacond
    )
);
$result = $statement->fetchAll();
$check_update3 = '';
if(isset($result))
{
    $check_update3 = 'good';
}else {
    $check_update3 = 'bad';
}
}


function update9($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9) {
$conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
$conx->exec('SET NAMES utf8');

$query = "
  UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4, $col5 = :data5, $col6 = :data6, $col7 = :data7, $col8 = :data8, $col9 = :data9
  WHERE $colcond = :datacond
";

$statement = $conx->prepare($query);
$statement->execute(
    array(
        ':data1'    =>   $data1,
        ':data2'    =>   $data2,
        ':data3'    =>   $data3,
        ':data4'    =>   $data4,
        ':data5'    =>   $data5,
        ':data6'    =>   $data6,
        ':data7'    =>   $data7,
        ':data8'    =>   $data8,
        ':data9'    =>   $data9,
        ':datacond' =>   $datacond
    )
);
$result = $statement->fetchAll();
$check_update3 = '';
if(isset($result))
{
    $check_update3 = 'good';
}else {
    $check_update3 = 'bad';
}
}

function update15($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4, $col5 = :data5, $col6 = :data6, $col7 = :data7, $col8 = :data8, $col9 = :data9, $col10 = :data10, $col11 = :data11, $col12 = :data12, $col13 = :data13, $col14 = :data14, $col15 = :data15 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':data3'    =>   $data3,
            ':data4'    =>   $data4,
            ':data5'    =>   $data5,
            ':data6'    =>   $data6,
            ':data7'    =>   $data7,
            ':data8'    =>   $data8,
            ':data9'    =>   $data9,
            ':data10'    =>   $data10,
            ':data11'    =>   $data11,
            ':data12'    =>   $data12,
            ':data13'    =>   $data13,
            ':data14'    =>   $data14,
            ':data15'    =>   $data15,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update3 = '';
    if(isset($result))
    {
        $check_update3 = 'good';
    }else {
        $check_update3 = 'bad';
    }
}


function update23($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4, $col5 = :data5, $col6 = :data6, $col7 = :data7, $col8 = :data8, $col9 = :data9, $col10 = :data10, $col11 = :data11, $col12 = :data12, $col13 = :data13, $col14 = :data14, $col15 = :data15, $col16 = :data16, $col17 = :data17, $col18 = :data18, $col19 = :data19, $col20 = :data20, $col21 = :data21, $col22 = :data22, $col23 = :data23 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':data3'    =>   $data3,
            ':data4'    =>   $data4,
            ':data5'    =>   $data5,
            ':data6'    =>   $data6,
            ':data7'    =>   $data7,
            ':data8'    =>   $data8,
            ':data9'    =>   $data9,
            ':data10'    =>   $data10,
            ':data11'    =>   $data11,
            ':data12'    =>   $data12,
            ':data13'    =>   $data13,
            ':data14'    =>   $data14,
            ':data15'    =>   $data15,
            ':data16'    =>   $data16,
            ':data17'    =>   $data17,
            ':data18'    =>   $data18,
            ':data19'    =>   $data19,
            ':data20'    =>   $data20,
            ':data21'    =>   $data21,
            ':data22'    =>   $data22,
            ':data23'    =>   $data23,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update3 = '';
    if(isset($result))
    {
        $check_update3 = 'good';
    }else {
        $check_update3 = 'bad';
    }
}


function update24($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23,$col24,$data24) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4, $col5 = :data5, $col6 = :data6, $col7 = :data7, $col8 = :data8, $col9 = :data9, $col10 = :data10, $col11 = :data11, $col12 = :data12, $col13 = :data13, $col14 = :data14, $col15 = :data15, $col16 = :data16, $col17 = :data17, $col18 = :data18, $col19 = :data19, $col20 = :data20, $col21 = :data21, $col22 = :data22, $col23 = :data23, $col24 = :data24 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':data3'    =>   $data3,
            ':data4'    =>   $data4,
            ':data5'    =>   $data5,
            ':data6'    =>   $data6,
            ':data7'    =>   $data7,
            ':data8'    =>   $data8,
            ':data9'    =>   $data9,
            ':data10'    =>   $data10,
            ':data11'    =>   $data11,
            ':data12'    =>   $data12,
            ':data13'    =>   $data13,
            ':data14'    =>   $data14,
            ':data15'    =>   $data15,
            ':data16'    =>   $data16,
            ':data17'    =>   $data17,
            ':data18'    =>   $data18,
            ':data19'    =>   $data19,
            ':data20'    =>   $data20,
            ':data21'    =>   $data21,
            ':data22'    =>   $data22,
            ':data23'    =>   $data23,
            ':data24'    =>   $data24,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update3 = '';
    if(isset($result))
    {
        $check_update3 = 'good';
    }else {
        $check_update3 = 'bad';
    }
}


function update25($table,$colcond,$datacond,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6,$col7,$data7,$col8,$data8,$col9,$data9,$col10,$data10,$col11,$data11,$col12,$data12,$col13,$data13,$col14,$data14,$col15,$data15,$col16,$data16,$col17,$data17,$col18,$data18,$col19,$data19,$col20,$data20,$col21,$data21,$col22,$data22,$col23,$data23,$col24,$data24,$col25,$data25) {
    $conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
    $conx->exec('SET NAMES utf8');

    $query = "
      UPDATE $table set $col1 = :data1, $col2 = :data2, $col3 = :data3, $col4 = :data4, $col5 = :data5, $col6 = :data6, $col7 = :data7, $col8 = :data8, $col9 = :data9, $col10 = :data10, $col11 = :data11, $col12 = :data12, $col13 = :data13, $col14 = :data14, $col15 = :data15, $col16 = :data16, $col17 = :data17, $col18 = :data18, $col19 = :data19, $col20 = :data20, $col21 = :data21, $col22 = :data22, $col23 = :data23, $col24 = :data24, $col25 = :data25 
      WHERE $colcond = :datacond
    ";

    $statement = $conx->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   $data1,
            ':data2'    =>   $data2,
            ':data3'    =>   $data3,
            ':data4'    =>   $data4,
            ':data5'    =>   $data5,
            ':data6'    =>   $data6,
            ':data7'    =>   $data7,
            ':data8'    =>   $data8,
            ':data9'    =>   $data9,
            ':data10'    =>   $data10,
            ':data11'    =>   $data11,
            ':data12'    =>   $data12,
            ':data13'    =>   $data13,
            ':data14'    =>   $data14,
            ':data15'    =>   $data15,
            ':data16'    =>   $data16,
            ':data17'    =>   $data17,
            ':data18'    =>   $data18,
            ':data19'    =>   $data19,
            ':data20'    =>   $data20,
            ':data21'    =>   $data21,
            ':data22'    =>   $data22,
            ':data23'    =>   $data23,
            ':data24'    =>   $data24,
            ':data25'    =>   $data25,
            ':datacond' =>   $datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update3 = '';
    if(isset($result))
    {
        $check_update3 = 'good';
    }else {
        $check_update3 = 'bad';
    }
}

/*
function insert2 ($table,$col1,$data1,$col2,$data2) {
    $query = "
      INSERT INTO $table ($col1,$col2) 
      VALUES (:data1,:data2)
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1' =>   $data1,
            ':data2' =>   $data2
        )
    );
    $result = $statement->fetchAll();
    $check = '';
    if(isset($result))
    {
        $check = 'good';
    }else {
        $check = 'bad';
    }

    return $check;
}
*/

/*
function update2 (table,colcond,datacond,col1,data1,col2,data2) {
    $query = "
      UPDATE table set col1 = :data1, col2 = :data2 
      WHERE colcond = :datacond
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':data1'    =>   data1,
            ':data2'    =>   data2,
            ':datacond' =>   datacond
        )
    );
    $result = $statement->fetchAll();
    $check_update1 = '';
    if(isset($result))
    {
        $check_update1 = 'good';
    }else {
        $check_update1 = 'bad';
    }
}
*/

?>


