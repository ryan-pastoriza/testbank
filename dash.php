<?php 
  $class->loaddb();
  $month=date("F");
  $year=date("Y");
  $var=100;
  if ($month=="June" or $month=="July" or $month=="August" or $month=="September" or $month=="October") {
    $semester= 1;
    $yr=$year."-";
  }else if ($month=="November" or $month=="December" or $month=="January" or $month=="February" or $month=="March") {
    $semester= 2;
    $yr="-".$year;
  }
    $sql1="SELECT Count(tqstatus.status_desc) AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND tqstatus.status_desc = 'printed' AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%'";
    $result1=mysql_query($sql1);
    while ($row=mysql_fetch_array($result1)) {
      $Prelim=$row['count'];
      if (empty($Prelim)) {
        $Prelim=0;
      }
    }
    $sql2="SELECT Count(tqstatus.status_desc) AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND tqstatus.status_desc = 'printed' AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' ";
    $result2=mysql_query($sql2);
    while ($row=mysql_fetch_array($result2)) {
      $Midterm=$row['count'];
      if (empty($Midterm)) {
        $Midterm=0;
      }
    }
    $sql3="SELECT Count(tqstatus.status_desc) AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND tqstatus.status_desc = 'printed' AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' ";
    $result3=mysql_query($sql3);
    while ($row=mysql_fetch_array($result3)) {
      $Prefinal=$row['count'];
      if (empty($Prefinal)) {
        $Prefinal=0;

      }
    }
    $sql4="SELECT Count(tqstatus.status_desc) AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND tqstatus.status_desc = 'printed' AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' ";
    $result4=mysql_query($sql4);
    while ($row=mysql_fetch_array($result4)) {
      $Final=$row['count'];
      if (empty($Final)) {
        $Final=0;
      }
    }



    $sqli1="SELECT Count(tqstatus.status_desc) AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND tqstatus.late = 'yes' AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' ";
    $resulti1=mysql_query($sqli1);
    while ($row=mysql_fetch_array($resulti1)) {
      $Prelim1=$row['count'];
      if (empty($Prelim1)) {
        $Prelim1=0;
      }
    }
    $sqli2="SELECT Count(tqstatus.status_desc) AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND tqstatus.late = 'yes' AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' ";
    $resulti2=mysql_query($sqli2);
    while ($row=mysql_fetch_array($resulti2)) {
      $Midterm1=$row['count'];
      if (empty($Midterm1)) {
        $Midterm1=0;
      }
    }
    $sqli3="SELECT Count(tqstatus.status_desc) AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND tqstatus.late = 'yes' AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' ";
    $resulti3=mysql_query($sqli3);
    while ($row=mysql_fetch_array($resulti3)) {
      $Prefinal1=$row['count'];
      if (empty($Prefinal1)) {
        $Prefinal1=0;
      }
    }
    $sqli4="SELECT Count(tqstatus.status_desc) AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND tqstatus.late = 'yes' AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' ";
    $resulti4=mysql_query($sqli4);
    while ($row=mysql_fetch_array($resulti4)) {
      $Final1=$row['count'];
      if (empty($Final1)) {
        $Final1=0;
      }
    }

    $sqlq1="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Identification%'";
    $resultq1=mysql_query($sqlq1);
    while ($row=mysql_fetch_array($resultq1)) {
      $iden=$row['count'];
    }
    $sqlq2="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Enumeration%'";
    $resultq2=mysql_query($sqlq2);
    while ($row=mysql_fetch_array($resultq2)) {
      $enu=$row['count'];
    }
    $sqlq3="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Matching Type%'";
    $resultq3=mysql_query($sqlq3);
    while ($row=mysql_fetch_array($resultq3)) {
      $match=$row['count'];
    }
    $sqlq4="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Problem Solving%'";
    $resultq4=mysql_query($sqlq4);
    while ($row=mysql_fetch_array($resultq4)) {
      $prob=$row['count'];
    }
    $sqlq5="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Essay%'";
    $resultq5=mysql_query($sqlq5);
    while ($row=mysql_fetch_array($resultq5)) {
      $essay=$row['count'];
    }
    $sqlq6="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'True or False'";
    $resultq6=mysql_query($sqlq6);
    while ($row=mysql_fetch_array($resultq6)) {
      $tof=$row['count'];
    }
    $sqlq7="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Fill in the Blank%'";
    $resultq7=mysql_query($sqlq7);
    while ($row=mysql_fetch_array($resultq7)) {
      $fitb=$row['count'];
    }
    $sqlq8="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Multiple Choice%'";
    $resultq8=mysql_query($sqlq8);
    while ($row=mysql_fetch_array($resultq8)) {
      $multi=$row['count'];
    }
    $sqlq9="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Analogy%'";
    $resultq9=mysql_query($sqlq9);
    while ($row=mysql_fetch_array($resultq9)) {
      $ana=$row['count'];
    }
    $sqlq11="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'Modified True or False'";
    $resultq11=mysql_query($sqlq11);
    while ($row=mysql_fetch_array($resultq11)) {
      $mtof=$row['count'];
    }
    $sqlq12="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'Short-Response Test'";
    $resultq12=mysql_query($sqlq12);
    while ($row=mysql_fetch_array($resultq12)) {
      $srt=$row['count'];
    }
    $sqlq13="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'Proving'";
    $resultq13=mysql_query($sqlq13);
    while ($row=mysql_fetch_array($resultq13)) {
      $prov=$row['count'];
    }
    $sqlq11="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'Sentence Completion Test'";
    $resultq11=mysql_query($sqlq11);
    while ($row=mysql_fetch_array($resultq11)) {
      $sct=$row['count'];
    }

  
  $class->sqlclose();
?>
<script>
  $(function () {
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas);
    var areaChartData = {
      labels: ["Prelim", "Midterm", "Prefinal", "Final"],
      datasets: [
        {
          label: "Approved TQ",
          fillColor: "#16A085",
          strokeColor: "#16A085",
          pointColor: "#16A085",
          pointStrokeColor: "#16A085",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $Prelim; ?>,<?php echo $Midterm; ?>,<?php echo $Prefinal; ?>,<?php echo $Final; ?>]
        },
        {
          label: "Late TQ",
          fillColor: "#C0392B",
          strokeColor: "#C0392B",
          pointColor: "#C0392B",
          pointStrokeColor: "#C0392B",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $Prelim1; ?>,<?php echo $Midterm1; ?>,<?php echo $Prefinal1; ?>,<?php echo $Final1; ?>]
        },
        {
          label: "Pending",
          fillColor: "#3b8bba",
          strokeColor: "#3b8bba",
          pointColor: "#3b8bba",
          pointStrokeColor: "#3b8bba",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $Prelim1; ?>,<?php echo $Midterm1; ?>,<?php echo $Prefinal1; ?>,<?php echo $Final1; ?>]
        },
        {
          label: "Total Population",
          fillColor: "#c1c7d1",
          strokeColor: "#c1c7d1",
          pointColor: "#c1c7d1",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $Prelim1; ?>,<?php echo $Midterm1; ?>,<?php echo $Prefinal1; ?>,<?php echo $Final1; ?>]
        }

      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines: true,
      bezierCurve: true,
      bezierCurveTension: 0.3,
      pointDot: false,
      pointDotRadius: 4,
      pointDotStrokeWidth: 1,
      pointHitDetectionRadius: 20,
      datasetStroke: true,
      datasetStrokeWidth: 2,
      datasetFill: false,
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      maintainAspectRatio: true,
      responsive: true
    };
    areaChart.Line(areaChartData, areaChartOptions);
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?php echo $essay; ?>,
        color: "#C0392B",
        highlight: "#C0392B",
        label: "Essay"
      },
      {
        value: <?php echo $prob; ?>,
        color: "#E74C3C",
        highlight: "#E74C3C",
        label: "Problem Solving"
      },
      {
        value: <?php echo $multi; ?>,
        color: "#9B59B6",
        highlight: "#9B59B6",
        label: "Multiple Choice"
      },
      {
        value: <?php echo $enu; ?>,
        color: "#8E44AD",
        highlight: "#8E44AD",
        label: "Enumeration"
      },
      {
        value: <?php echo $iden; ?>,
        color: "#2980B9",
        highlight: "#2980B9",
        label: "Identification"
      },
      {
        value: <?php echo $tof; ?>,
        color: "#3498DB",
        highlight: "#3498DB",
        label: "True or False"
      },
      {
        value: <?php echo $match; ?>,
        color: "#1ABC9C",
        highlight: "#1ABC9C",
        label: "Matching Type"
      },
      {
        value: <?php echo $fitb; ?>,
        color: "#16A085",
        highlight: "#16A085",
        label: "Fill in the Blank"
      },
      {
        value: <?php echo $ana; ?>,
        color: "#27AE60",
        highlight: "#27AE60",
        label: "Analogy"
      },
      {
        value: <?php echo $mtof; ?>,
        color: "#2ECC71",
        highlight: "#2ECC71",
        label: "Modified True or False"
      },
      {
        value: <?php echo $srt; ?>,
        color: "#F1C40F",
        highlight: "#F1C40F",
        label: "Short-Response Test"
      },
      {
        value: <?php echo $prov; ?>,
        color: "#F39C12",
        highlight: "#F39C12",
        label: "Proving"
      },
      {
        value: <?php echo $sct; ?>,
        color: "#E67E22",
        highlight: "#E67E22",
        label: "Sentence Completion Test"
      }
    ];
    var pieOptions = {
      segmentShowStroke: true,
      segmentStrokeColor: "#fff",
      segmentStrokeWidth: 2,
      animationSteps: 100,
      animationEasing: "easeOutBounce",
      animateRotate: true,
      animateScale: false,
      responsive: true,
      maintainAspectRatio: true,
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    pieChart.Doughnut(PieData, pieOptions);

  });
</script>