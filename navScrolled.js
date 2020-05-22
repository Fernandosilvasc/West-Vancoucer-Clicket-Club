const nav = document.querySelector("nav");
const sectionOne = document.querySelector('.nextPrevBtn');

const sectionOneOptions = {};

const sectionOneObserver = new IntersectionObserver(function (
  entries,
//   sectionOneObserver
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      nav.classList.add("nav-scrolled");
    } else {
      nav.classList.remove("nav-scrolled");
    }
  });
},
sectionOneOptions);

sectionOneObserver.observe(sectionOne);
