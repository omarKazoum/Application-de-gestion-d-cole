<?php
$searchEndpointsLabels = ['admin', 'classes', 'parents', 'professeur', 'student'];
$searchActionValue = false;
foreach ($searchEndpointsLabels as $endpointLabel)
    if (\core\Router::isRequestFor($endpointLabel))
        switch ($endpointLabel) {
            case 'admin':
                $searchActionValue = 'admin';
                break;
            case 'classes':
                $searchActionValue = 'classes';
                break;
            case 'parents':
                $searchActionValue = 'parents';
                break;
            case 'professeur':
                $searchActionValue = 'Professeurs';
                break;
            case 'student':
                $searchActionValue = 'student';
                break;
            default:
                $searchActionValue = false;
        }

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="NAVBAR_PAGE_NAVBAR">
  <div class="container-fluid">
    <a class="navbar-brand" id="LOGO" href="index.php">
      <img src="<?= \img('logo1.png') ?>" alt="logo website" id="LOGO_WEBSITE">
    </a>
    <!----Button menu--->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"
      aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #FF8303;">
      <!-------icon menu--->
      <span class="navbar-toggler-icon"></span>
    </button>
    <!----Content navbar--->
    <div class="collapse navbar-collapse" id="navmenu">
      <!--Input search group -->
      <form
        class="w- input-group d-flex justify-content-start justify-content-md-end <?= !$searchActionValue ? 'd-none' : '' ?>"
        action="<?= getUrlFor($searchActionValue) ?>">
        <input name="word" type="search" class="form-md shadow" placeholder="Search" aria-label="Search"
          aria-describedby="basic-addon2" id="INPUT_SEARCH">
        <div class="input-group-append">
          <button class="btn " type="submit" id="BUTTON_SEARCH"><i id="ICON_SEARCH" class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
  </div>
  </form>
  </div>
  </div>
</nav>