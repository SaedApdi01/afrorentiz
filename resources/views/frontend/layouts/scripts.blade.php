<!-- JS for theme + dropdown -->
<script>
    // Theme Toggle
    function toggleTheme() {
        const html = document.documentElement;
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }

    // Avatar Dropdown (Desktop)
    const avatarBtn = document.getElementById('avatarBtn') || document.getElementById('user-menu-button');
    const dropdownMenu = document.getElementById('dropdownMenu');
    if (avatarBtn && dropdownMenu) {
        avatarBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!avatarBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    }

    // Avatar Dropdown (Mobile)
    const mobileAvatarBtn = document.getElementById('mobileAvatarBtn');
    const mobileDropdownMenu = document.getElementById('mobileDropdownMenu');
    if (mobileAvatarBtn && mobileDropdownMenu) {
        mobileAvatarBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            mobileDropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!mobileAvatarBtn.contains(e.target) && !mobileDropdownMenu.contains(e.target)) {
                mobileDropdownMenu.classList.add('hidden');
            }
        });
    }

    // Mobile Menu Toggle
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');

    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    }
</script>

<script>
    function openSearchModal() {
        document.getElementById('searchModal').classList.remove('hidden');
    }

    function closeSearchModal() {
        document.getElementById('searchModal').classList.add('hidden');
    }
    // Mobile Avatar dropdown toggle
    const mobileAvatarBtn = document.getElementById('mobileAvatarBtn');
    const mobileDropdownMenu = document.getElementById('mobileDropdownMenu');

    mobileAvatarBtn.addEventListener('click', function(e) {
        mobileDropdownMenu.classList.toggle('hidden');
    });

    // Close mobile dropdown when clicking outside
    window.addEventListener('click', function(e) {
        if (!mobileAvatarBtn.contains(e.target) && !mobileDropdownMenu.contains(e.target)) {
            mobileDropdownMenu.classList.add('hidden');
        }
    });
</script>
<script>
    window.addEventListener('load', function () {
        document.getElementById('loader').style.display = 'none';
    });
</script>
