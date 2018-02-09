/* ------------------------------------------------------------------------------
 *
 *  # Echarts - lines and areas
 *
 *  Lines and areas chart configurations
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function() {


    // Set paths
    // ------------------------------

    require.config({
        paths: {
            echarts: 'assets/js/plugins/visualization/echarts'
        }
    });


    // Configuration
    // ------------------------------

    require(
        [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/bar',
            'echarts/chart/line'
        ],


        // Charts setup
        function (ec, limitless) {


            // Initialize charts
            // ------------------------------
			  var stacked_lines = ec.init(document.getElementById('stacked_lines'), limitless);



            // Charts setup
            // ------------------------------

           
            // Stacked lines options
            //

            stacked_lines_options = {

                // Setup grid
                grid: {
                    x: 40,
                    x2: 20,
                    y: 35,
                    y2: 25
                },

                // Add tooltip
                tooltip: {
                    trigger: 'axis'
                },

                // Add legend
                legend: {
                    data: ['点击量', '展示量', '花费', '点击率']
                },

                // Enable drag recalculate
                calculable: true,

                // Hirozontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: [
                        '07-28', '07-29', '07-30', '07-31', '08-01', '08-02', '08-03'
                    ]
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value'
                }],

                // Add series
                series: [
                    {
                        name: '点击量',
                        type: 'line',
                        stack: 'Total',
                        data: [120, 132, 101, 134, 90, 230, 210]
                    },
                    {
                        name: '展示量',
                        type: 'line',
                        stack: 'Total',
                        data: [220, 182, 191, 234, 290, 330, 310]
                    },
                    {
                        name: '花费',
                        type: 'line',
                        stack: 'Total',
                        data: [150, 232, 201, 154, 190, 330, 410]
                    },
                    {
                        name: '点击率',
                        type: 'line',
                        stack: 'Total',
                        data: [320, 332, 301, 334, 390, 330, 320]
                    }
                ]
            };





            // Apply options
            // ------------------------------

            stacked_lines.setOption(stacked_lines_options);



            // Resize charts
            // ------------------------------

            window.onresize = function () {
                setTimeout(function () {
                    stacked_lines.resize();
                }, 200);
            }
        }
    );
});
