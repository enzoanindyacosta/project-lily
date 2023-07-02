<div class="dropdown position-absolute top-0 end-0">
  <button class="btn btn-sm btn-transparent dropdown-toggle rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: white" id='lang-btn'>
    English
  </button>
  <ul class="dropdown-menu">
    <li>
      <a class="dropdown-item" href="#" id="lang-en">
        English
        <i class="fas fa-check ms-2 visible"></i>
      </a>
    </li>
    <li>
      <a class="dropdown-item" href="#" id="lang-my">
        Malay
        <i class="fas fa-check ms-2 invisible"></i>
      </a>
    </li>
  </ul>
</div>

<script>
  const langBtn = document.getElementById('lang-btn');
  const langEn = document.getElementById('lang-en');
  const langMy = document.getElementById('lang-my');

  langEn.addEventListener('click', () => {
    langEn.querySelector('i').classList.remove('invisible');
    langEn.querySelector('i').classList.add('visible');
    langMy.querySelector('i').classList.remove('visible');
    langMy.querySelector('i').classList.add('invisible');
  });

  langMy.addEventListener('click', () => {
    langMy.querySelector('i').classList.remove('invisible');
    langMy.querySelector('i').classList.add('visible');
    langEn.querySelector('i').classList.remove('visible');
    langEn.querySelector('i').classList.add('invisible');
  });

  if (langEn.querySelector('i').classList.contains('visible')) {
    document.documentElement.lang = 'en';
    langBtn.textContent = 'Language';
  } else if (langMy.querySelector('i').classList.contains('visible')) {
    document.documentElement.lang = 'my';
    langBtn.textContent = 'Bahasa';
  }

  langEn.addEventListener('click', () => {
    document.documentElement.lang = 'en';
    langBtn.textContent = 'English';
  });

  langMy.addEventListener('click', () => {
    document.documentElement.lang = 'my';
    langBtn.textContent = 'Bahasa';
  });
</script>