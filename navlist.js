
    // Conditionally add icons based on user role
    const userRole = "<?php echo $_SESSION['level'] ?? ''; ?>";
    const navList = document.querySelectorAll(".navlist a");

    // Remove event listeners for all items first (in case there's a previous state)
    navList.forEach((navItem) => {
        navItem.removeEventListener('click', preventAccess);
    });

    // User role-specific changes
    if (userRole === 'Dosen') {
        navList[5].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Akademik</a>';
        navList[4].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Keuangan</a>';
        navList[3].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dosen</a>';
        navList[2].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Jadwal</a>'; 

        // Add event listeners only for the items that are restricted for 'Dosen'
        navList.forEach((navItem, index) => {
            if (![0, 1, 6].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    } else if (userRole === 'Kaprodi') {
        navList[6].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Pembimbing</a>';
        navList[5].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Akademik</a>';
        navList[4].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Keuangan</a>';
        navList[0].innerHTML = '<a href="tampilanapprovalpembimbing"> <i class="ri-git-repository-private-line"></i> Mahasiswa</a>'; 

        // Add event listeners only for the items that are restricted for 'Kaprodi'
        navList.forEach((navItem, index) => {
            if (![1, 2, 3].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    } else if (userRole === 'Keuangan') {
        navList[6].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Pembimbing</a>';
        navList[5].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Akademik</a>';
        navList[3].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dosen</a>';
        navList[2].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Jadwal</a>';
        navList[1].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dokumen</a>'; 
        navList[0].innerHTML = '<a href="tampilanapprovalkeuangan"> <i class="ri-git-repository-private-line"></i> Mahasiswa</a>'; 
  

        // Add event listeners only for the items that are restricted for 'Keuangan'
        navList.forEach((navItem, index) => {
            if (![1, 4].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    } else if (userRole === 'Akademik') {
        navList[6].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Pembimbing</a>';
        navList[4].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Keuangan</a>';
        navList[3].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dosen</a>';
        navList[2].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Jadwal</a>';
        navList[0].innerHTML = '<a href="tampilanapprovalkeuangan"> <i class="ri-git-repository-private-line"></i> Mahasiswa</a>'; 
 

        // Add event listeners only for the items that are restricted for 'Akademik'
        navList.forEach((navItem, index) => {
            if (![1, 5].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    }

    // Function to prevent access for restricted nav items
    function preventAccess(event) {
        event.preventDefault();
        alert("Anda Tidak diperkenankan untuk Masuk");
    }

    // Mobile menu toggle (optional)
    const menuIcon = document.getElementById("menu-icon");
    const navListMobile = document.querySelector(".navlist");

    menuIcon.addEventListener("click", () => {
        navListMobile.classList.toggle("active");
    });