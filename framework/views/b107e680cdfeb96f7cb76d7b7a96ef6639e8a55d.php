<!DOCTYPE html>
<html class="no-js" lang="zxx">
  
<!-- Mirrored from zomur.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 May 2024 08:17:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="Site keywords here" />
    <meta name="description" content="#" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Site Title -->
    <title>Zomur - Modern Bootstrap Dashboard Template</title>

    <!-- Fav Icon -->
    <link rel="icon" href="<?php echo e(asset('assets')); ?>/img/favicon.png"/>

    <!--  Stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/slick.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/font-awesome-all.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/charts.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/datatables.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/fancy-box.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/nice-select.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/pikaday.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/reset.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  </head>
  <body id="crancy-dark-light">
    <div class="crancy-body-area">
      <!-- crancy Admin Menu -->
      
      <?php echo $__env->make('administrators.layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- End crancy Admin Menu -->

      <!-- Start Header -->
      
      <?php echo $__env->make('administrators.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- End Header -->

      <!-- crancy Dashboard -->
      
      <?php echo $__env->yieldContent('main-content'); ?>
      <!-- End crancy Dashboard -->
    </div>

    <!--  Scripts -->
    
    <script src="<?php echo e(asset('assets')); ?>/js/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/jquery-migrate.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/popper.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/charts.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/final-countdown.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/fancy-box.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/fullcalendar.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/datatables.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/circle-progress.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/nice-select.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/pikaday.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/main.js"></script>

    <script>
      $(document).ready(function () {
        $("#crancy-table__main").DataTable({
          searching: true, // Enable search functionality
          info: true,
          lengthChange: true, // Enable the ability to change the number of records per page
          pageLength: 6,
          lengthMenu: [
            [6, 14, 25, 50, -1],
            [6, 14, 25, 50, "All"],
          ],
          language: {
            paginate: {
              next: '<i class="fas fa-angle-right"></i>',
              previous: '<i class="fas fa-angle-left"></i>',
            },
            lengthMenu: "Show result: _MENU_ ", // Customize the "Show entries" text
          },
          dom: 'rt<"crancy-table-bottom"flp><"clear">', // Set the desired layout for the table
        });
      });
    </script>
    <script>
      var picker = new Pikaday({ field: document.getElementById("dateInput") });
      // Create a new instance of Pikaday for the date-input field
      const picker1 = new Pikaday({
        field: document.getElementById("date-input"),
        format: "DD MMM", // Set the desired format
        toString(date, format) {
          const day = date.getDate();
          const month = date.toLocaleString("default", { month: "short" });
          const formattedDate = `${day} ${month}`;
          return formattedDate;
        },
      });

      // Create another instance of Pikaday for the dateInput field
      const picker2 = new Pikaday({
        field: document.getElementById("dateInput"),
        // ... other options for the dateInput picker
      });
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("crancy-calender");
        var calendar = new FullCalendar.Calendar(calendarEl, {
          defaultView: "timeGridWeek",
          contentHeight: "auto",
          height: "100%",
          fixedWeekCount: false,
          showNonCurrentDates: true,
          columnHeaderFormat: {
            week: "ddd",
          },
        });
        calendar.render();
      });
    </script>

    <script>
      jQuery(document).ready(function ($) {
        $(".circle__one").circleProgress({
          size: 82,
          thickness: 8,
          lineCap: "round",
          fill: {
            // the fill color and border radius of the progress bar
            color: "#194BFB",
            borderRadius: "5px",
          },
          border: {
            // the border color, width, and border radius of the progress bar
            color: "#000",
            width: 5,
            borderRadius: "315px",
          },
          emptyFill: "#CEE6FF", // the background color of the progress bar
        });

        $(".circle__two").circleProgress({
          lineCap: "round",
          fill: {
            // the fill color and border radius of the progress bar
            color: "#EF5DA8",
            borderRadius: "50px",
          },
          border: {
            // the border color, width, and border radius of the progress bar
            color: "#000",
            width: 50,
            borderRadius: "50px",
          },
          emptyFill: "#FCDFEE", // the background color of the progress bar
        });

        $(".circle__three").circleProgress({
          lineCap: "round",
          fill: {
            // the fill color and border radius of the progress bar
            color: "#27AE60",
            borderRadius: "50px",
          },
          border: {
            // the border color, width, and border radius of the progress bar
            color: "#000",
            width: 50,
            borderRadius: "50px",
          },
          emptyFill: "#D4EFDF", // the background color of the progress bar
        });

        $(".circle__four").circleProgress({
          lineCap: "round",
          fill: {
            // the fill color and border radius of the progress bar
            color: "#9B51E0",
            borderRadius: "50px",
          },
          border: {
            // the border color, width, and border radius of the progress bar
            color: "#000",
            width: 50,
            borderRadius: "50px",
          },
          emptyFill: "#EBDCF9", // the background color of the progress bar
        });

        $(".circle_side_one").circleProgress({
          startAngle: -Math.PI / 1,
          lineCap: "round",
          size: 250,
          fill: {
            // the fill color and border radius of the progress bar
            color: "#9B51E0",
            borderRadius: "10px",
          },
          border: {
            // the border color, width, and border radius of the progress bar
            color: "#000",
            width: 190,
            borderRadius: "10px",
          },
          emptyFill: "#D7B9F3", // the background color of the progress bar
        });

        $(".circle_side_two").circleProgress({
          startAngle: -Math.PI / 3,
          lineCap: "round",
          size: 250,
          fill: {
            // the fill color and border radius of the progress bar
            color: "#0A82FD",
            borderRadius: "50px",
          },
          border: {
            // the border color, width, and border radius of the progress bar
            color: "#000",
            width: 190,
            borderRadius: "50px",
          },
          emptyFill: "#9DCDFE", // the background color of the progress bar
        });

        $(".circle_side_three").circleProgress({
          startAngle: -Math.PI / 2,
          lineCap: "round",
          size: 250,
          fill: {
            // the fill color and border radius of the progress bar
            color: "#F2C94C",
            borderRadius: "50px",
          },
          border: {
            // the border color, width, and border radius of the progress bar
            color: "#000",
            width: 190,
            borderRadius: "50px",
          },
          emptyFill: "#FAE9B7", // the background color of the progress bar
        });
      });
    </script>
    
    
  </body>

<!-- Mirrored from zomur.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 May 2024 08:17:55 GMT -->
</html>
<?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/administrators/layouts/master.blade.php ENDPATH**/ ?>