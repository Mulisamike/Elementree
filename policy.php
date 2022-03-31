<?php

  session_start();
	include 'connection/dbConfig.php';

  if(isset($_SESSION['username'])){

?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Policy</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <link rel="shortcut icon" type="image/jpg" href="assets/img/hollard.jpg"/>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      <!-- Desktop sidebar -->
      <?php include "includes/sidebar.php"?>
      <!-- Mobile sidebar -->

      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
      </div>

      
      
      <div class="flex flex-col flex-1 w-full">
      <?php include "includes/header.php"?>

        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Policy
            </h2>
            <!-- CTA -->
            <a
              class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
              href="https://github.com/estevanmaito/windmill-dashboard"
            >
              <div class="flex items-center">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <!-- <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path> -->
                </svg>
                <span>Dashboard/Policy</span>
              </div>
              <!-- <span>Add Policy &RightArrow;</span> -->
            </a>

            <!-- With actions -->
            <!-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"> Table with actions </h4> -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <?php
                    $select_policy = "SELECT * FROM policy";
                    $run_policy = mysqli_query($conn, $select_policy);

                ?>
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">Policy ID</th>
                      <th class="px-4 py-3">Term</th>
                      <th class="px-4 py-3">Total Amount</th>
                      <th class="px-4 py-3">Per Month</th>
                      <th class="px-4 py-3">Payment Method</th>
                      <th class="px-4 py-3">Coverage</th>
                      <th class="px-4 py-3">Age Limit</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

                  <?php
                      while($row_policy = mysqli_fetch_assoc($run_policy)){

                      
                  ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3 text-sm">
                      <p class="font-semibold"><?php echo $row_policy['policy_id']; ?></p>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $row_policy['term']; ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $row_policy['health_status']; ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $row_policy['system']; ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php echo $row_policy['payment_method']; ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php echo $row_policy['coverage']; ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php echo $row_policy['age_limit']; ?>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                   
                  </tbody>
                </table>
              </div>
             
            </div>

          </div>
        </main>
      </div>
    </div>
  </body>
</html>

<?php

}else{
  header("location: authentication/login.php ");
}
?>