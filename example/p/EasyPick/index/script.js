// Function to filter items based on the selected category
function filterItems(category) {
  const items = document.querySelectorAll('#item-list li');
  items.forEach((item) => {
    const itemCategory = item.getAttribute('data-category');
    if (category === 'all' || category === itemCategory) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
}

// Event listener for the category filter dropdown
const categoryFilter = document.getElementById('category-filter');
categoryFilter.addEventListener('change', () => {
  const selectedCategory = categoryFilter.value;
  filterItems(selectedCategory);
});

// Initially, display all items
filterItems('all');


function togglePassword() {
  var passwordInput = document.getElementById("form1Example23");
  var showPasswordCheckbox = document.getElementById("showPassword");

  if (showPasswordCheckbox.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

function toggleMenu() {
  const menuSidebar = document.querySelector('.menu-sidebar');
  menuSidebar.classList.toggle('menu-open');
}
