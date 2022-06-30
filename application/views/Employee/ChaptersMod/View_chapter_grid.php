
<body>


    <div class="page-wrapper">

        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="blog-title"><?php echo $Title_chapter . ' : ' . $Name_chapter ?></h3>
                </div>

            </div>
            <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a class="nav-link active show" href="#about-cont" data-toggle="tab">Diagnostics</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Flowchart</a></li>
            </ul>
            </br>
            <div class="tab-content">

                <div class="tab-pane show active" id="about-cont">

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th>Subject</th>
                                        <th>Constat</th>
                                        <th>Note</th>
                                        <th></th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $existarray = array();
                                    //foreach ($subject as $row) {
                                    //foreach ($question as $row2) {
                                    foreach ($response as $row3) {
                                        array_push($existarray, $row3['ID_question']);
                                    }
                                    // }
                                    //}

                                    //foreach ($existarray as $row) {
                                    //     echo $row;
                                    // }
                                    ?>

                                    <?php

                                    $somme = 0;
                                    $i = 0;
                                    $result = 0;
                                    $resultarray = array();
                                    $resultarraytitle = array();
                                    if (isset($subject)) {
                                        if (isset($empty)) {
                                    ?>
                                            <p>No Subjects</p>
                                            <?php  } else {
                                            foreach ($subject as $row) {

                                            ?>
                                                <tr role="row" class="odd">
                                                    <td><?php echo $row['Number_subject'] . '. ' . $row['Title_subject']  ?></td>
                                                    <td>
                                                        <table>

                                                            <?php
                                                            foreach ($question as $row2) {
                                                                if ($row['ID_subject'] == $row2['ID_subject']) {
                                                            ?>
                                                                    <tr>
                                                                        <td><?php echo $row2['Text_question'] ?></td>
                                                                        <?php
                                                                        if (in_array($row2['ID_question'], $existarray)) {

                                                                            foreach ($response as $row3) {
                                                                                if ($row2['ID_question'] == $row3['ID_question']) {
                                                                        ?>
                                                                                    <td><?php echo $row3['Metaphor_constat'] . ' ' . $row3['Title_constat'] ?></td>
                                                                                    <td><?php echo $row3['Value_response'] ?></td>
                                                                                    <td>
                                                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_edit_response?ID_question=<?php echo $row2['ID_question'] ?>&ID_response=<?php echo $row3['ID_response'] ?>&ID_grid=<?php echo $row3['ID_grid'] ?>">
                                                                                            <button class="btn btn-primary btn-primary-three float-right" style="width: 38px;"><i class="fa fa-pencil m-r-5"></i></button>
                                                                                        </a>
                                                                                        </br></br>
                                                                                        <a href="<?php echo base_url() ?>/Employee_Account/Delete_response?ID_chapter=<?php echo $ID_chapter ?>&ID_response=<?php echo $row3['ID_response'] ?>&ID_grid=<?php echo $row3['ID_grid'] ?>">
                                                                                            <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                                                        </a>
                                                                                    </td>
                                                                            <?php
                                                                                }
                                                                            }
                                                                        } else { ?>
                                                                            <td colspan="3">
                                                                                <a href="<?php echo base_url() ?>/Employee_Account/Form_add_response?ID_chapter=<?php echo $ID_chapter ?>&ID_question=<?php echo $row2['ID_question'] ?>&ID_grid=<?php echo $ID_grid ?>">
                                                                                    <button class="btn btn-primary btn-primary-two float-right"> + Add Response</button>
                                                                                </a>
                                                                            </td>
                                                                        <?php } ?>

                                                                    </tr>

                                                            <?php }
                                                            } ?>

                                                        </table>

                                                    </td>
                                                    <td>
                                                        <table>

                                                            <?php foreach ($note as $row2) {
                                                                if ($row['ID_subject'] == $row2['ID_subject']) {
                                                            ?>
                                                                    <tr>
                                                                        <td><?php echo $row2['Text_note'] ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_edit_note?ID_note=<?php echo $row2['ID_note'] ?>&ID_subject=<?php echo $row['ID_subject'] ?>&ID_grid=<?php echo $ID_grid ?>&ID_chapter=<?php echo $ID_chapter ?>">
                                                                                <button class="btn btn-primary btn-primary-three float-right" style="width: 38px;"><i class="fa fa-pencil m-r-5"></i></button>
                                                                            </a>
                                                                            </br></br>
                                                                            <a href="<?php echo base_url() ?>/Employee_Account/Delete_note?ID_note=<?php echo $row2['ID_note'] ?>&ID_grid=<?php echo $ID_grid ?>&ID_chapter=<?php echo $ID_chapter ?>">
                                                                                <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                            <?php }
                                                            } ?>

                                                        </table>
                                                        <div class="text-center m-t-20">
                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_note?ID_chapter=<?php echo $ID_chapter ?>&ID_subject=<?php echo $row['ID_subject'] ?>&ID_grid=<?php echo $ID_grid ?>">
                                                                <button class="btn btn-primary submit-btn" style="background-color: #ffbc35;font-size: 12px;" type="button">New Note</button>
                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td>


                                                        <?php
                                                        foreach ($question as $row2) {
                                                            if ($row['ID_subject'] == $row2['ID_subject']) {
                                                        ?>

                                                                <?php
                                                                if (in_array($row2['ID_question'], $existarray)) {

                                                                    foreach ($response as $row3) {
                                                                        if ($row2['ID_question'] == $row3['ID_question']) {
                                                                            // echo $row3['Value_response'];
                                                                            $somme = $somme + $row3['Value_response'];
                                                                            if (($row3['Value_response'] != 0) & ($row3['Value_response'] != null)) {
                                                                                $i = $i + 1;
                                                                            }

                                                                            $result = $somme / $i;
                                                                ?>

                                                                    <?php
                                                                        }
                                                                    } ?>
                                                                    <?php //echo $row3['Value_response'];
                                                                    ?>
                                                                <?php  } else { ?>
                                                                    <?php $somme = $somme + 0;
                                                                    if ($i != 0) {
                                                                        $result = $somme / $i;
                                                                    } else {
                                                                        $result = 0;
                                                                    }
                                                                    // $i = $i+0;
                                                                    //echo $row3['Value_response'];
                                                                    ?>

                                                                <?php } ?>



                                                        <?php }
                                                        } ?>
                                                    <td>
                                                        <?php
                                                        array_push($resultarray, array($result, $row['Title_subject']));
                                                        //array_push($resultarraytitle,$row['Title_subject']);

                                                        echo round($result, 2);
                                                        $somme = 0;
                                                        $result = 0;
                                                        $i = 0;
                                                        ?>
                                                    </td>


                                                    </td>
                                                </tr>
                                    <?php }
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


                <div id="bottom-tab2">
                    <?php
                    $i = 0;
                    $var_chart = '';
                    $tab = '';
                    $tab2 = '';

                    foreach ($resultarray as $row) {
                        //$var_chart = $var_chart . "['" . $resultarray[$i][1] . "', '" . $resultarray[$i][0] . "'],";
                        $tab .= "['" . trim($resultarray[$i][1]) . "'," . $resultarray[$i][0] . "],";
                        $tab2 .= "['" . trim($resultarray[$i][1]) . "'," . $resultarray[$i][0] . ",' none '],";

                        $i = $i + 1;
                    }
                    // echo $tab;
                    ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <div id="top_x_div" style="width: 200px; height: 300px;"></div>
                        </div>
                        <div class="col-sm-4">
                            <div id="chart-area"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {




            $("#btn_add").click(function() {
                swal({
                    title: 'Save',
                    text: "Are you sure?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancel',

                    confirmButtonText: 'Yes'
                }).then((result) => {

                    if (result.value) {
                        //$("#action").val(1);


                        $('form#popup').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script src='https://www.gstatic.com/charts/loader.js'></script>
    <script>
        google.charts.load('49', {
            'packages': ['vegachart']
        }).then(loadCharts);

        const lasagna = [
            ["Protein", 0.1308, "Lasagna, cheese, frozen, prepared"],
            ["Carbohydrates", 0.05032727272727273, "Lasagna, cheese, frozen, prepared"],
            ["Vitamin C", 0.228, "Lasagna, cheese, frozen, prepared"],
            ["Calcium", 0.08538461538461538, "Lasagna, cheese, frozen, prepared"],
            ["Zinc", 0.11375, "Lasagna, cheese, frozen, prepared"],
            ["Sodium", 0.18933333333333333, "Lasagna, cheese, frozen, prepared"]
        ];

        const pork = [
            <?php echo $tab2 ?>
        ];

        const melon = [
            ["Protein", 0.0168, "Melons, cantaloupe, raw"],
            ["Carbohydrates", 0.029672727272727274, "Melons, cantaloupe, raw"],
            ["Vitamin C", 0.4893333333333334, "Melons, cantaloupe, raw"],
            ["Calcium", 0.006923076923076923, "Melons, cantaloupe, raw"],
            ["Zinc", 0.0225, "Melons, cantaloupe, raw"],
            ["Sodium", 0.010666666666666666, "Melons, cantaloupe, raw"]
        ];

        function loadCharts() {
            addChart(pork[0][2], pork, "#6633CC");
        };

        function addChart(title, data, color) {
            const dataTable = new google.visualization.DataTable();
            dataTable.addColumn({
                type: 'string',
                'id': 'key'
            });
            dataTable.addColumn({
                type: 'number',
                'id': 'value'
            });
            dataTable.addColumn({
                type: 'string',
                'id': 'category'
            });
            dataTable.addRows(data);

            const options = {
                'vega': {
                    "$schema": "https://vega.github.io/schema/vega/v5.json",
                    "width": 250,
                    "height": 300,
                    "autosize": "none",
                    "title": {
                        "text": title,
                        "anchor": "middle",
                        "fontSize": 14,
                        "dy": -8,
                        "dx": {
                            "signal": "-width/4"
                        },
                        "subtitle": ""
                    },
                    "signals": [{
                        "name": "radius",
                        "update": "90"
                    }],
                    "data": [{
                            "name": "table",
                            "source": "datatable",
                        },
                        {
                            "name": "keys",
                            "source": "table",
                            "transform": [{
                                "type": "aggregate",
                                "groupby": ["key"]
                            }]
                        }
                    ],
                    "scales": [{
                            "name": "angular",
                            "type": "point",
                            "range": {
                                "signal": "[-PI, PI]"
                            },
                            "padding": 0.5,
                            "domain": {
                                "data": "table",
                                "field": "key"
                            }
                        },
                        {
                            "name": "radial",
                            "type": "linear",
                            "range": {
                                "signal": "[0, radius]"
                            },
                            "zero": true,
                            "nice": false,
                            "domain": [0, 0.5],
                        }
                    ],
                    "encode": {
                        "enter": {
                            "x": {
                                "signal": "width/2"
                            },
                            "y": {
                                "signal": "height/2 + 20"
                            }
                        }
                    },
                    "marks": [{
                            "type": "group",
                            "name": "categories",
                            "zindex": 1,
                            "from": {
                                "facet": {
                                    "data": "table",
                                    "name": "facet",
                                    "groupby": ["category"]
                                }
                            },
                            "marks": [{
                                    "type": "line",
                                    "name": "category-line",
                                    "from": {
                                        "data": "facet"
                                    },
                                    "encode": {
                                        "enter": {
                                            "interpolate": {
                                                "value": "linear-closed"
                                            },
                                            "x": {
                                                "signal": "scale('radial', datum.value) * cos(scale('angular', datum.key))"
                                            },
                                            "y": {
                                                "signal": "scale('radial', datum.value) * sin(scale('angular', datum.key))"
                                            },
                                            "stroke": {
                                                "value": color
                                            },
                                            "strokeWidth": {
                                                "value": 1.5
                                            },
                                            "fill": {
                                                "value": color
                                            },
                                            "fillOpacity": {
                                                "value": 0.1
                                            }
                                        }
                                    }
                                },
                                {
                                    "type": "text",
                                    "name": "value-text",
                                    "from": {
                                        "data": "category-line"
                                    },
                                    "encode": {
                                        "enter": {
                                            "x": {
                                                "signal": "datum.x + 14 * cos(scale('angular', datum.datum.key))"
                                            },
                                            "y": {
                                                "signal": "datum.y + 14 * sin(scale('angular', datum.datum.key))"
                                            },
                                            "text": {
                                                "signal": "format(datum.datum.value,'.1%')"
                                            },
                                            "opacity": {
                                                "signal": "datum.datum.value > 0.01 ? 1 : 0"
                                            },
                                            "align": {
                                                "value": "center"
                                            },
                                            "baseline": {
                                                "value": "middle"
                                            },
                                            "fontWeight": {
                                                "value": "bold"
                                            },
                                            "fill": {
                                                "value": color
                                            },
                                        }
                                    }
                                }
                            ]
                        },
                        {
                            "type": "rule",
                            "name": "radial-grid",
                            "from": {
                                "data": "keys"
                            },
                            "zindex": 0,
                            "encode": {
                                "enter": {
                                    "x": {
                                        "value": 0
                                    },
                                    "y": {
                                        "value": 0
                                    },
                                    "x2": {
                                        "signal": "radius * cos(scale('angular', datum.key))"
                                    },
                                    "y2": {
                                        "signal": "radius * sin(scale('angular', datum.key))"
                                    },
                                    "stroke": {
                                        "value": "lightgray"
                                    },
                                    "strokeWidth": {
                                        "value": 1
                                    }
                                }
                            }
                        },
                        {
                            "type": "text",
                            "name": "key-label",
                            "from": {
                                "data": "keys"
                            },
                            "zindex": 1,
                            "encode": {
                                "enter": {
                                    "x": {
                                        "signal": "(radius + 11) * cos(scale('angular', datum.key))"
                                    },
                                    "y": [{
                                            "test": "sin(scale('angular', datum.key)) > 0",
                                            "signal": "5 + (radius + 11) * sin(scale('angular', datum.key))"
                                        },
                                        {
                                            "test": "sin(scale('angular', datum.key)) < 0",
                                            "signal": "-5 + (radius + 11) * sin(scale('angular', datum.key))"
                                        },
                                        {
                                            "signal": "(radius + 11) * sin(scale('angular', datum.key))"
                                        }
                                    ],
                                    "text": {
                                        "field": "key"
                                    },
                                    "align": {
                                        "value": "center"
                                    },
                                    "baseline": [{
                                            "test": "scale('angular', datum.key) > 0",
                                            "value": "top"
                                        },
                                        {
                                            "test": "scale('angular', datum.key) == 0",
                                            "value": "middle"
                                        },
                                        {
                                            "value": "bottom"
                                        }
                                    ],
                                    "fill": {
                                        "value": "black"
                                    },
                                    "fontSize": {
                                        "value": 12
                                    }
                                }
                            }
                        },
                        {
                            "type": "line",
                            "name": "twenty-line",
                            "from": {
                                "data": "keys"
                            },
                            "encode": {
                                "enter": {
                                    "interpolate": {
                                        "value": "linear-closed"
                                    },
                                    "x": {
                                        "signal": "0.2 * radius * cos(scale('angular', datum.key))"
                                    },
                                    "y": {
                                        "signal": "0.2 * radius * sin(scale('angular', datum.key))"
                                    },
                                    "stroke": {
                                        "value": "lightgray"
                                    },
                                    "strokeWidth": {
                                        "value": 1
                                    }
                                }
                            }
                        },
                        {
                            "type": "line",
                            "name": "fourty-line",
                            "from": {
                                "data": "keys"
                            },
                            "encode": {
                                "enter": {
                                    "interpolate": {
                                        "value": "linear-closed"
                                    },
                                    "x": {
                                        "signal": "0.4 * radius * cos(scale('angular', datum.key))"
                                    },
                                    "y": {
                                        "signal": "0.4 * radius * sin(scale('angular', datum.key))"
                                    },
                                    "stroke": {
                                        "value": "lightgray"
                                    },
                                    "strokeWidth": {
                                        "value": 1
                                    }
                                }
                            }
                        },
                        {
                            "type": "line",
                            "name": "sixty-line",
                            "from": {
                                "data": "keys"
                            },
                            "encode": {
                                "enter": {
                                    "interpolate": {
                                        "value": "linear-closed"
                                    },
                                    "x": {
                                        "signal": "0.6 * radius * cos(scale('angular', datum.key))"
                                    },
                                    "y": {
                                        "signal": "0.6 * radius * sin(scale('angular', datum.key))"
                                    },
                                    "stroke": {
                                        "value": "lightgray"
                                    },
                                    "strokeWidth": {
                                        "value": 1
                                    }
                                }
                            }
                        },
                        {
                            "type": "line",
                            "name": "eighty-line",
                            "from": {
                                "data": "keys"
                            },
                            "encode": {
                                "enter": {
                                    "interpolate": {
                                        "value": "linear-closed"
                                    },
                                    "x": {
                                        "signal": "0.8 * radius * cos(scale('angular', datum.key))"
                                    },
                                    "y": {
                                        "signal": "0.8 * radius * sin(scale('angular', datum.key))"
                                    },
                                    "stroke": {
                                        "value": "lightgray"
                                    },
                                    "strokeWidth": {
                                        "value": 1
                                    }
                                }
                            }
                        },
                        {
                            "type": "line",
                            "name": "outer-line",
                            "from": {
                                "data": "radial-grid"
                            },
                            "encode": {
                                "enter": {
                                    "interpolate": {
                                        "value": "linear-closed"
                                    },
                                    "x": {
                                        "field": "x2"
                                    },
                                    "y": {
                                        "field": "y2"
                                    },
                                    "stroke": {
                                        "value": "lightgray"
                                    },
                                    "strokeWidth": {
                                        "value": 1
                                    }
                                }
                            }
                        }
                    ]
                }
            };

            const elem = document.createElement("div");
            elem.setAttribute("style", "display: inline-block; width: 250px; height: 300px; padding: 20px;");

            const chart = new google.visualization.VegaChart(elem);
            chart.draw(dataTable, options);

            document.getElementById("chart-area").appendChild(elem);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);



        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Move', 'Percentage'],
                <?php echo  $tab; ?>
            ]);

            var options = {
                width: 600,
                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'Subjects Flowchart',
                    subtitle: 'conformity by percentage'
                },
                axes: {
                    x: {
                        0: {
                            side: 'top',
                            label: 'White to move'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "90%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>