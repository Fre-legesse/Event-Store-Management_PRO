@php
    session_start();
    $dataPoints = array();
    $dataPoints2 = array();
    $dataPoints3= array();
    $dataPoints4=array();
    $dataPoints5=array();
    $dataPoints6=array();
    $dataPoints30=array();
    $dataPoints40=array();
    $result4row=0;
    $result7row=0;
    $row10=0;
    $result81row=0;
    $result3row=0;
    //Best practice is to create a separate file for handling connection to database
    try{
         // Creating a new connection.
        // Replace your-hostname, your-db, your-username, your-password according to your database
        $link = new \PDO(   'mysql:host=localhost;dbname=csms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                            'root', //'root',
                            '', //'',
                            array(
                                \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                \PDO::ATTR_PERSISTENT => false
                            )
                        );



    $uid=1;
    $location=1;





        $handle = $link->prepare('SELECT document.Agreement_Type,document_catagory.CName, COUNT(*) as countnum FROM document INNER JOIN document_catagory ON document.Agreement_Type=document_catagory.ID INNER JOIN document_privilage ON document_privilage.Folders=document.Document_path WHERE document_privilage.users='.$uid.' GROUP BY Agreement_Type');
        $handle->execute();
        $result = $handle->fetchAll(\PDO::FETCH_OBJ);

        foreach($result as $row){
            array_push($dataPoints, array("y"=> $row->countnum, "label"=> $row->CName));
        }


        $handle2 = $link->prepare("SELECT DATE_FORMAT(document.Document_Exp_Date,'%M %Y') AS dateformat1, document.Agreement_Type,document_catagory.CName,document.Document_Exp_Date, COUNT(*) as countnum FROM document INNER JOIN document_catagory ON document.Agreement_Type=document_catagory.ID INNER JOIN document_privilage ON document_privilage.Folders=document.Document_path WHERE document_privilage.users=".$uid." and Document_Exp_Date >= now() AND Document_Exp_Date is not null GROUP BY dateformat1  ORDER BY Document_Exp_Date");

       // $handle2 = $link->prepare("SELECT DATE_FORMAT(document.Document_Exp_Date,'%Y,%m,%d') AS dateformat1, document.Agreement_Type,document_catagory.CName,document.Document_Exp_Date, COUNT(*) as countnum FROM document INNER JOIN document_catagory ON document.Agreement_Type=document_catagory.ID INNER JOIN document_privilage ON document_privilage.Folders=document.Document_path WHERE document_privilage.users=".$uid." and Document_Exp_Date >= now() AND Document_Exp_Date is not null GROUP BY dateformat1  ORDER BY Document_Exp_Date");
        $handle2->execute();
        $result2 = $handle2->fetchAll(\PDO::FETCH_OBJ);

              foreach($result2 as $row){
           array_push($dataPoints2, array("y"=> $row->countnum, "label"=> $row->dateformat1));
           // array_push($dataPoints2, array( "x"=> $row->dateformat1,"y"=> $row->countnum,"indexLabel"=>"gain","markerType"=>"triangle","markerColor"=>"#6B8E23"));
           // { x: new Date(2016, 00, 1), y: 61, indexLabel: "gain", markerType: "triangle",  markerColor: "#6B8E23" },
                 }


        $handle3 = $link->prepare("SELECT document.DID ,document.Document_Name, document.Document_Code, document.Document_path, document.Revision ,document.Agenda,document.Version , document.Document_val_Date, document.Document_Exp_Date, document.Extension, document.DCat, document.Agreedwith, document.Exp_notif, document.Created_Date, document.User_Id, document.Status,document_catagory.ID,document_catagory.CName,document_catagory.CDescription,document_catagory.Status,document_privilage.ID,document_privilage.Folders,document_privilage.users,document_privilage.Type FROM document   INNER JOIN document_catagory ON document_catagory.ID=document.Agreement_Type

      INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path
       WHERE  document.Status = true AND document_privilage.users=".$uid."  ORDER BY document.Created_Date DESC Limit 6");
        $handle3->execute();
        $result3 = $handle3->fetchAll(\PDO::FETCH_OBJ);
        $result3row=$handle3->rowCount();



    //document draft draft_document
          $handle30 = $link->prepare("SELECT  count(draft_document.DID) as countnum, WEEK(draft_document.Document_val_Date) AS weeknum, draft_document.DID ,draft_document.Document_Name, draft_document.Document_Code, draft_document.Document_path, draft_document.Revision ,draft_document.Agenda,draft_document.Version , draft_document.Document_val_Date, draft_document.Document_Exp_Date, draft_document.Extension, draft_document.DCat, draft_document.Agreedwith, draft_document.Exp_notif, draft_document.Created_Date, draft_document.User_Id, draft_document.Status,draft_document_catagory.ID,draft_document_catagory.CName,draft_document_catagory.CDescription,draft_document_catagory.Status,document_privilage.ID,document_privilage.Folders,document_privilage.users,document_privilage.Type FROM draft_document   INNER JOIN draft_document_catagory ON draft_document_catagory.ID=draft_document.Agreement_Type

      INNER JOIN document_privilage ON  document_privilage.Folders=draft_document.Document_path
       WHERE  draft_document.Status = true AND draft_document.Agreement_Type=2 AND ( WEEK(draft_document.Document_Val_Date)  BETWEEN WEEK(draft_document.Document_Val_Date) - 4 AND WEEK(CURRENT_DATE)) AND document_privilage.users=".$uid." GROUP BY WEEK(draft_document.Document_val_Date)  ORDER BY draft_document.Created_Date DESC");
        $handle30->execute();
        $handle30 = $handle30->fetchAll(\PDO::FETCH_OBJ);
        //$result30row=$handle30->rowCount();

          foreach($handle30 as $row30){
           array_push($dataPoints30, array( "y"=> $row30->countnum,"label"=>  "Week ".$row30->weeknum));
           // array_push($dataPoints2, array( "x"=> $row->dateformat1,"y"=> $row->countnum,"indexLabel"=>"gain","markerType"=>"triangle","markerColor"=>"#6B8E23"));
           // { x: new Date(2016, 00, 1), y: 61, indexLabel: "gain", markerType: "triangle",  markerColor: "#6B8E23" },
                 }
                // var_dump($dataPoints30);
        //{ label: "apple",  y: 10  }
      //array_push($dataPoints3, array(label=>  "Week ".$row["weeknum"], y : $row["countnum"]));





        $handle4 = $link->prepare("SELECT document.DID ,document.Document_Name, document.Document_Code, document.Document_path, document.Revision ,document.Agenda,document.Version , document.Document_val_Date, document.Document_Exp_Date, document.Extension, document.DCat, document.Agreedwith, document.Exp_notif, document.Created_Date, document.User_Id, document.Status,document_catagory.ID,document_catagory.CName,document_catagory.CDescription,document_catagory.Status,document_privilage.ID,document_privilage.Folders,document_privilage.users,document_privilage.Type FROM document   INNER JOIN document_catagory ON document_catagory.ID=document.Agreement_Type

      INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path
       WHERE   document_privilage.users=".$uid."  ORDER BY document.Created_Date DESC");
        $handle4->execute();
        $result4 = $handle4->fetchAll(\PDO::FETCH_OBJ);
        $result4row=$handle4->rowCount();
        array_push($dataPoints3, array("y"=>  $result4row, "label"=> 'ALL Files'));

      $handle7 = $link->prepare("SELECT * from events where Status = 1");
        $handle7->execute();
        $result7 = $handle7->fetchAll(\PDO::FETCH_OBJ);
        $result7row=$handle7->rowCount();
        array_push($dataPoints5, array("y"=>  $result7row, "label"=> ''));


       $sql11 = $link->prepare("SELECT document.DID ,document.Document_Name, document.Document_Code, document.Document_path, document.Revision ,document.Agenda,document.Version , document.Document_val_Date, document.Document_Exp_Date, document.Extension, document.DCat, document.Agreedwith, document.Exp_notif, document.Created_Date, document.User_Id, document.Status,document_catagory.ID,document_catagory.CName,document_catagory.CDescription,document_catagory.Status,document_privilage.ID,DATEDIFF(Document_Exp_Date,now()) AS NOTE,document_privilage.Folders,document_privilage.users,document_privilage.Type FROM document   INNER JOIN document_catagory ON document_catagory.ID=document.Agreement_Type

      INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path
       WHERE document.Status=1 AND DATEDIFF(Document_Exp_Date,now())<= document.Exp_notif AND DATEDIFF(Document_Exp_Date,now()) < 0 and  document.Status = true AND document_privilage.users=".$uid."  ORDER BY document.DID DESC");
        $sql11->execute();
        $result81 = $sql11->fetchAll(\PDO::FETCH_OBJ);
        $result81row=$sql11->rowCount();


        $sql10 = $link->prepare("SELECT document.DID ,document.Document_Name, document.Document_Code, document.Document_path, document.Revision ,document.Agenda,document.Version , document.Document_val_Date, document.Document_Exp_Date, document.Extension, document.DCat, document.Agreedwith, document.Exp_notif, document.Created_Date, document.User_Id, document.Status,document_catagory.ID,document_catagory.CName,document_catagory.CDescription,document_catagory.Status,document_privilage.ID,DATEDIFF(Document_Exp_Date,now()) AS NOTE,document_privilage.Folders,document_privilage.users,document_privilage.Type FROM document   INNER JOIN document_catagory ON document_catagory.ID=document.Agreement_Type

      INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path
       WHERE document.Status=1 AND DATEDIFF(Document_Exp_Date,now())<= document.Exp_notif AND DATEDIFF(Document_Exp_Date,now()) >=0 and  document.Status = true AND document_privilage.users=".$uid."  ORDER BY document.DID DESC");

    $sql10->execute();
    $row10=$sql10->rowCount();

          $handle5 = $link->prepare("SELECT (SELECT COUNT(Document_Code) FROM document INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path WHERE document_privilage.users=".$uid." AND Document_Code LIKE 'BGI%') as BGI,(SELECT COUNT(Document_Code) FROM document INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path WHERE document_privilage.users=".$uid." and  Document_Code LIKE 'Cast%') as Castel ,(SELECT COUNT(Document_Code) FROM document INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path WHERE document_privilage.users=".$uid." and Document_Code LIKE 'Ray%') as Raya,document.Document_path,(SELECT COUNT(Document_Code) FROM document INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path WHERE document_privilage.users=".$uid." AND Document_Code LIKE 'Zeb%') as Zebider,(SELECT COUNT(Document_Code) FROM document INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path WHERE document_privilage.users=".$uid." AND Document_Code LIKE 'Som%') as Someda FROM document INNER JOIN document_privilage ON  document_privilage.Folders=document.Document_path
       WHERE   document_privilage.users=".$uid." GROUP BY document.Document_path LIMIT 1");
          $handle5->execute();
          $row101=$handle5->rowCount();
          if($row101 > 0){
          $result5 = $handle5->fetchAll(\PDO::FETCH_OBJ);
          $a=array("y"=> $result5[0]->BGI,"label"=>"BGI");
          $b=array("y"=> $result5[0]->Castel,"label"=>"Castel");
          $c=array("y"=> $result5[0]->Raya,"label"=>"Raya");
          $d=array("y"=> $result5[0]->Zebider,"label"=>"Zebidar");
          $e=array("y"=> $result5[0]->Someda,"label"=>"Somdiaa");

            if ($result5[0]->BGI >= 1) {
               array_push($dataPoints4, $a);
            }
            if ($result5[0]->Castel >= 1) {
              array_push($dataPoints4,$b);
            }
            if ($result5[0]->Raya >=1) {
              array_push($dataPoints4,$c);
            }
            if ($result5[0]->Zebider >= 1) {
              array_push($dataPoints4,$d);
            }
            if ($result5[0]->Someda >= 1 ) {
              array_push($dataPoints4,$e);
            }


    }


     $handle40 = $link->prepare("SELECT (SELECT COUNT(Document_path) FROM draft_document INNER JOIN document_privilage ON document_privilage.Folders=`draft_document`.`Document_path` WHERE document_privilage.users=".$uid." and `draft_document`.`Document_path` LIKE 'Files/Draft Document/IT%') AS IT, (SELECT COUNT(Document_path) FROM draft_document INNER JOIN document_privilage ON document_privilage.Folders=`draft_document`.`Document_path` WHERE document_privilage.users=".$uid." and `draft_document`.`Document_path` LIKE 'Files/Draft Document/Supply Chain%') AS IT2 FROM draft_document INNER JOIN document_privilage ON document_privilage.Folders=`draft_document`.`Document_path` WHERE document_privilage.users=".$uid." GROUP BY `draft_document`.`Document_path` LIMIT 1");
          $handle40->execute();
          $row1010=$handle40->rowCount();

          if($row1010 > 0){
          $result40 = $handle40->fetchAll(\PDO::FETCH_OBJ);
          $a40=array("y"=> $result40[0]->IT,"label"=>"IT");
          $b40=array("y"=> $result40[0]->IT2,"label"=>"Supply Chain");
          /*$c40=array("y"=> $result40[0]->Raya,"label"=>"Marketing");
          $d40=array("y"=> $result40[0]->Zebider,"label"=>"Sales");
          $e40=array("y"=> $result40[0]->Someda,"label"=>"Somdiaa");
          */
          $percent=$result40[0]->IT+$result40[0]->IT2;


            if ($result40[0]->IT >= 1) {
               array_push($dataPoints40, $a40);
            }
            if ($result40[0]->IT2 >= 1) {
              array_push($dataPoints40,$b40);
            }
         /*   if ($result40[0]->Raya >=1) {
              array_push($dataPoints40,$c40);
            }
            if ($result40[0]->Zebider >= 1) {
              array_push($dataPoints40,$d40);
            }
            if ($result40[0]->Someda >= 1 ) {
              array_push($dataPoints40,$e40);
            }
            */



    }


        $link = null;
    }
    catch(\PDOException $ex){
        print($ex->getMessage());
    }


@endphp


@extends('layouts.app')

<script src="../assets/js/jquery.min.js"></script>

<script>
    window.onload = function () {


        createHiDPICanvas = function (w, h, ratio) {
            if (!ratio) {
                ratio = PIXEL_RATIO;
            }
            var can = document.createElement("canvas");
            can.width = w * ratio;
            can.height = h * ratio;
            can.style.width = w + "px";
            can.style.height = h + "px";
            can.getContext("2d").setTransform(ratio, 0, 0, ratio, 0, 0);
            return can;
        }


        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title: {
                text: ""
            },
            axisY: {
                title: "Number Of Document"
            },
            data: [{
                type: "bar",
                showInLegend: false,
                legendMarkerColor: "",
                legendText: "",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        /**
         var chart2 = new CanvasJS.Chart("chartContainer2", {
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  animationEnabled: true,
  title:{
    text: ""
  },
  axisX: {
    interval:4,
    intervalType: "month",
    valueFormatString: "MMM-YYYY"
  },
  axisY:{
    title: "",
    valueFormatString: "0"
  },
  data: [{
    type: "line",
    markerSize: 22,
    xValueFormatString: "MMM, YYYY",
    yValueFormatString: "##",
    dataPoints: <?php echo json_encode($dataPoints2); ?>
        }]
});
         **/

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: ""
            },
            axisY: {
                title: "Number Of Document"
            },
            data: [{
                type: "stepLine",
                showInLegend: false,

                markerSize: 10,
                markerType: "triangle",
                color: "#F08080",
                markerColor: "red",
                legendText: "Document Catagory",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });

        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            title: {
                text: "",
                horizontalAlign: "left"
            },
            data: [{
                type: "doughnut",
                startAngle: 60,
                innerRadius: 80,
                indexLabelFontSize: 23,
                indexLabel: "{label} - @php  echo $result4row; @endphp",
                toolTipContent: "<b> {y} </b>Documents ",
                dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }]
        });
        var chart4 = new CanvasJS.Chart("chartContainer4", {
            animationEnabled: true,
            theme: "dark2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: ""
            },
            axisY: {
                title: "Number Of Document"
            },
            data: [{
                type: "column",
                showInLegend: false,
                legendMarkerColor: "",
                legendText: "",
                dataPoints: {{   json_encode($dataPoints4, JSON_NUMERIC_CHECK) }}
            }]
        });
        /**
         var chart30 = new CanvasJS.Chart("chartContainer30", {
    title:{
      text: "My First Chart in CanvasJS"
    },
    data: [
    {
      // Change type to "doughnut", "line", "splineArea", etc.
      type: "column",
      dataPoints: <?php echo json_encode($dataPoints30, JSON_NUMERIC_CHECK); ?>
        }
    ]
  });
         **/
        var chart30 = new CanvasJS.Chart("chartContainer30", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: ""
            },
            axisY: {
                title: "Number Of Document"
            },
            data: [{
                type: "area",
                showInLegend: false,
                legendMarkerColor: "",
                legendText: "",
                dataPoints: <?php echo json_encode($dataPoints30, JSON_NUMERIC_CHECK); ?>
            }]
        });
        //var chart40 = new CanvasJS.Chart("chartContainer40", {
        var options = {
            title: {
                text: "Created Draft Document Share Per Department"
            },
            subtitles: [{
                text: "2020"
            }],
            animationEnabled: true,
            data: [{
                type: "pie",
                startAngle: 40,
                toolTipContent: "<b>{label}</b>: {y}%",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - 100%",
                dataPoints: <?php echo json_encode($dataPoints40, JSON_NUMERIC_CHECK); ?>
            }]
        };

        $("#chartContainer40").CanvasJSChart(options);


        chart30.render();

        chart.render();
        chart4.render();
//chart40.render();
        chart2.render();
        chart5.render();


    }
</script>
<script src="../assets/js/jquery-1.11.1.min.js"></script>
<script src="../assets/js/jquery.canvasjs.min.js"></script>
<script src="../assets/js/canvasjs.min.js"></script>

@section('content')


    <div class="page-breadcrumb" style="background: rgb(157,157,201);
background: linear-gradient(177deg, rgba(157,157,201,1) 16%, rgba(255,255,255,1) 67%);">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <style type="text/css">


            .box {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .box-inner {
                border: 1px solid #DEDEDE;
                border-radius: 3px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                box-shadow: 0 0 10px rgba(189, 189, 189, 0.4);
                -webkit-box-shadow: 0 0 10px rgba(189, 189, 189, 0.4);
                -moz-box-shadow: 0 0 10px rgba(189, 189, 189, 0.4);
            }

            .box-header {
                border: none !important;
                padding-top: 5px !important;
                border-bottom: 1px solid #DEDEDE !important;
                border-radius: 3px 3px 0 0 !important;
                -webkit-border-radius: 3px 3px 0 0 !important;
                -moz-border-radius: 3px 3px 0 0 !important;
                height: 35px;
                min-height: 35px !important;
                margin-bottom: 0;
                font-weight: bold;
                font-size: 16px;
                background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.1) 100%) !important;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(0, 0, 0, 0.1))) !important;
                background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.1) 100%) !important;
                background: -o-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.1) 100%) !important;
                background: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.1) 100%) !important;
                background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.1) 100%) !important;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ffffff', endColorstr='#1a000000', GradientType=0) !important;

            }

            .box-header h2 {
                font-size: 15px;
                width: auto;
                clear: none;
                float: left;
                line-height: 25px;
                white-space: nowrap;
                font-weight: bold;
                margin-top: 0;
                margin-bottom: 0;
            }

            .box-header h3 {
                font-size: 13px;
                width: auto;
                clear: none;
                float: left;
                line-height: 25px;
                white-space: nowrap;
            }

            .box-header h2 > i {
                margin-top: 1px;
            }

            .box-icon {
                float: right;
            }

            .box-icon a {
                clear: none;
                float: left;
                margin: 0 2px;
                height: 20px;
                width: 5px;
                margin-top: 1px;
            }

            .box-icon a i {
                margin-left: -6px;
                top: -1px;
            }

            .box-content {
                padding: 10px;
            }

            .box-content.buttons {
                min-height: 297px;
            }


            .box-content .nav-tabs {
                margin-right: -10px;
                margin-left: -10px;
            }

            @media only screen and (min-width: 768px) and (max-width: 979px) {
                .box-icon {
                    display: none;
                }

                .box-header h2 {
                    font-size: 13px !important;
                }

                .box-header h3 {
                    font-size: 11px !important;
                }

                .main-menu-span {
                    width: 6.2% !important;
                    margin-right: 4%;
                }

                .top-menu > li i {
                    display: none;
                }

                .sidebar-nav li span {
                    display: block !important;
                }

                .sidebar-nav li a, .sidebar-nav .nav-header {
                    text-align: center
                }

                .sidebar-nav {
                    padding: 0;
                    margin-bottom: 0;
                }
            }

        </style>
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->

        <div class="box col-md-12" align="center">
            <div class="row">
                <div class="box col-md-4">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-list-alt"></i></h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round btn-default"><i
                                        class="glyphicon glyphicon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                        class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <h3>Current Active Events</h3>
                            <div id="chartContainer5h"
                                 style="height: 265px; width: 89%;size: 300px;font-size: 130px; color: #69a1ea; ">
                                @php echo $result7row; @endphp</div>
                        </div>
                    </div>
                </div>
                <div class="box col-md-4">
                    <div class="box-inner" style="height: 356px;">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="mdi mdi-arrow-down-bold-circle"></i> Draft cooler with Lowest Quantity In
                                Stock</h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round btn-default"><i
                                        class="glyphicon glyphicon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                        class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>

                        <div class="box-content">
                            <table>
                                <tr>
                                    <th style="width: 200px;">
                                        <h3 style="color: orange;margin-bottom: 10px; text-align: center;">Item</h3>
                                    </th>
                                    <th style="width: 200px;"><h3
                                            style="color: orange;margin-bottom: 10px; text-align: center;"></h3></th>
                                    <th style="width: 300px;">
                                        <h3 style="color: red;margin-bottom: 10px;text-align: center;">Quantity</h3>
                                    </th>
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <a href='docnotif.php?ID=0'
                                           style=' color: orange;text-decoration: none;height: 200px; text-align: center; size: 300px;font-size: 60px; color: orange;margin-left: 20px;'><?php echo "Test"; ?></a>
                                    </td>
                                    <td></td>
                                    <td>
                                        <a href='docnotif2.php?ID=0'
                                           style=' color: red;text-decoration: none;height: 200px; text-align: center; size: 300px;font-size: 160px;margin-left: 20px;'><?php echo $result81row; ?></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box col-md-4">
                    <div class="box-inner" style="height: 356px;">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="mdi mdi-do-not-disturb"></i> Approval Need Requests </h2><?php // donut ?>

                            <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round btn-default"><i
                                        class="glyphicon glyphicon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                        class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <div id="chartContainer4" style="height: 320px; width: 96%;">0</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box col-md-6">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star-empty"></i> NUMBER OF Event PER CATAGORY</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                        <div id="chartContainer" style="height: 320px; width: 89%;"></div>
                    </div>
                </div>
            </div>
            <div class="box col-md-6">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="mdi mdi-chart-bary"></i> Progress Box</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <br>
                        <div class="d-flex no-block align-items-center">
                            <span>81% Total Request</span>
                            <div class="ml-auto">
                                <span>81</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                 style="width: 81%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br><br>
                        <div class="d-flex no-block align-items-center">
                            <span>81% Approved Request/ Approver One</span>
                            <div class="ml-auto">
                                <span>81</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 81%"
                                 aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br><br>
                        <div class="d-flex no-block align-items-center">
                            <span>70% Approved Request/ Approver Two</span>
                            <div class="ml-auto">
                                <span>70</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 70%"
                                 aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br><br>
                        <div class="d-flex no-block align-items-center">
                            <span>10% Reject Request/ Approver one</span>
                            <div class="ml-auto">
                                <span>10</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                 style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br><br>
                        <div class="d-flex no-block align-items-center">
                            <span>0% Reject Request/ Approver Two</span>
                            <div class="ml-auto">
                                <span>0</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                 style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->

            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The fav icon -->
        <link rel="shortcut icon" href="img/download.png">


        <!--<body style="    -moz-transform: scale(0.8, 0.8); /* Moz-browsers */
            zoom: 0.8; /* Other non-webkit browsers */
            zoom: 90%; /* Webkit browsers */
        "> -->
        <!-- topbar starts -->

        <!-- topbar ends -->


        <div class="row">

            <div class="box col-md-6">
                <div class="box-inner">
                    <div class="box-header well" data-original-title=""
                         style="background: linear-gradient(to right, black 70%,#fa284b);">
                        <h2 style="color:white;"><i class="glyphicon glyphicon-star-empty"></i> Created Document Per
                            Week</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div id="chartContainer30" style="height: 320px; width: 89%;"></div>
                    </div>
                </div>
            </div>
            <div class="box col-md-6">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star-empty"></i> NUMBER OF DOCUMENTS WITH THEIR EXPIRY DATE
                        </h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div id="chartContainer2" style="height: 320px; width: 89%;"></div>
                    </div>
                </div>
            </div>
            <div class="box col-md-6">
                <div class="box-inner">
                    <div class="box-header well" data-original-title=""
                         style="background: linear-gradient(to right, black 70%,#fa284b);">
                        <h2 style="color:white;"><i class="glyphicon glyphicon-star-empty"></i></h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div id="chartContainer40" style="height: 320px; width: 89%;"></div>
                    </div>
                </div>
            </div>
            <div class="box col-md-6">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star-empty"></i> RECENT UPLOADED FILES</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable  responsive">
                            <thead>
                            <tr>
                                <th>Description</th>
                                <th>Catagroy</th>
                                <th>Uploaded Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result3row > 0){
                            foreach($result3 as $result)
                            { ?>

                            <tr>


                                <td style="width: 220px;"><?php if ($result->CName == 'Minutes') {
                                        $query_rsAgenda = "SELECT * FROM document WHERE DID = $result->DID";
                                        $query = $link->prepare($query_rsAgenda);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        echo $results[0]->Agenda;
                                        ?><?php } else if ($result->Revision != '' || $result->Revision != NULL || $result->Revision != 0) {
                                        echo $result->Document_Name . ' ' . $result->Revision;
                                    } else if ($result->Version != '' || $result->Version != NULL || $result->Version != '0') {
                                        echo $result->Document_Name . ' ' . $result->Version;
                                    } else {
                                        echo $result->Document_Name;
                                    } ?></td>

                                <td><?php echo $result->CName; ?></td>
                                <td><?php echo $result->Created_Date; ?></td>


                            </tr>
                            <?php }  }  ?>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>

            <!--
               <div class="box col-md-5">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-star-empty"></i>  </h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="box-content">

                        </div>
                    </div>
                </div>

              -->

            <!--
               <div class="box col-md-6">
                  <div class="box-inner">
                      <div class="box-header well" data-original-title="">
                          <h2><i class="glyphicon glyphicon-star-empty"></i>  </h2>

                          <div class="box-icon">
                              <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                      class="glyphicon glyphicon-chevron-up"></i></a>
                          </div>
                      </div>
                      <div class="box-content">
                         <div id="chartContainer6" style="height: 320px; width: 89%;"></div>
                      </div>
                  </div>
              </div>
              -->
        </div>
        <!--/#content.col-md-0-->
    </div><!--/fluid-row-->
    </div><!--/.fluid-container-->
    </div></div>
    <!-- external javascript -->




@endsection
@section('defalut')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
