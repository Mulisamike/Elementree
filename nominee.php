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
    <title>Admin | Nominees </title>
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
              Nominees
            </h2>
            <!-- CTA -->
            <a
              class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
              href="addNominee.php"
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
                <span>Dashboard/Nominees</span>
              </div>
              <span>Add Nominee &RightArrow;</span>
            </a>

            <!-- With actions -->
            <!-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"> Table with actions </h4> -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <?php
                    $select_nominee = "SELECT * FROM nominee";
                    $run_nominee = mysqli_query($conn, $select_nominee);
                ?>
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Nominee ID</th>
                      <th class="px-4 py-3">Client ID</th>
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">Gender</th>
                      <th class="px-4 py-3">Birth Date</th>
                      <th class="px-4 py-3">Relationship</th>
                      <th class="px-4 py-3">Priority</th>
                      <th class="px-4 py-3">Phone</th>
                      <th class="px-4 py-3">Status</th>
                      <th class="px-4 py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                  <?php
                      while($row_nominee = mysqli_fetch_assoc($run_nominee)){

                      
                  ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3 text-sm">
                      <p class="font-semibold"><?php echo $row_nominee['nominee_id'] ?></p>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $row_nominee['client_id'] ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $row_nominee['name'] ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $row_nominee['sex'] ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $row_nominee['birth_date'] ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $row_nominee['relationship'] ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php echo $row_nominee['priority'] ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php echo $row_nominee['phone'] ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <form action="clientStatus.php" method="GET">
                        <input type="hidden" name="client_id" value="<?php echo $row_nominee['client_id']; ?>">
                        <button type="submit">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> Check Status </span>
                        </button>
                        </form>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <form action="editNominee.php" method="GET">
                            <input type="hidden" name="nom_id" value="<?php echo $row_nominee['nominee_id'] ?>">
                          <button type="submit"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                          </button>
                          </form>
                          <form action="functions/deleteNominee.php" method="GET">
                            <input type="hidden" name="deleteNomineeBtn" value="<?php echo $row_nominee['nominee_id'] ?>">
                            <button type="submit"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Delete"
                              >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </button>
                          </form>
                        </div>
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