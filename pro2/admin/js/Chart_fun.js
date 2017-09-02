 /**************** Chart area ********************/
    var pieData = [
                {
                    value: 300,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "عدد الطﻻب"
                },
                {
                    value: 222,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "عدد المدرسين"
                },

                  {
                    value: 222,
                    color: "#1254aa",
                    highlight: "#ffD3D1",
                    label: "عدد الزوار"
                }
            
              

            ];

            window.onload = function(){
                var ctx = document.getElementById("chart-area").getContext("2d");
                window.myPie = new Chart(ctx).Pie(pieData);
            };
/**************** Chart area ********************/
