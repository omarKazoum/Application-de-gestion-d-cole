<div class="bg-white" id="SIDE_BAR">
  <ul>
    <li>
      <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Apprenant">
        <i class="bi bi-person-fill"></i>
      </a>
    </li>
    <li class="<?= core\Router::isRequestFor('professeur') ? 'active' : '' ?>">
      <a href="<?= getUrlFor('Professeurs') ?>" class="btn" data-bs-toggle="tooltip" data-bs-placement="right"
        title="Professeur">
        <i class="bi bi-briefcase-fill"></i>
      </a>
    </li>
    <li>
      <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Administrateur">
        <i><span class="material-symbols-outlined ICON_POSITION">
            admin_panel_settings
          </span></i>
      </a>
    </li>
    <li>
      <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Parents">
        <i><span class="material-symbols-outlined ICON_POSITION">
            family_restroom
          </span></i>
      </a>
    </li>
    <li class="<?= core\Router::isRequestFor('classes') ? 'active' : '' ?>">
      <a href="<?= getUrlFor('classes') ?>" class="btn" data-bs-toggle="tooltip" data-bs-placement="right"
        title="Classes">
        <i class="bi bi-house"></i>
      </a>
    </li>
    <li class="<?= core\Router::isRequestFor('stats') ? 'active' : '' ?>">
      <a href="<?= getUrlFor('statistiques/') ?>" class="btn" data-bs-toggle="tooltip" data-bs-placement="right"
        title="statistiques">
          <i><span class="material-symbols-outlined">bar_chart</span></i>
      </a>
    </li>
    <li>
      <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Logout">
        <i class="bi bi-box-arrow-left"></i>
      </a>
    </li>
  </ul>
</div>