const arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

const filteredArr = (array) => {
  const arrFilter = [];
  for (let i = 0; i < array.length; i++) {
    if (i % 2 === 0) {
      arrFilter.push(array[i]);
    }
  }
  return arrFilter;
};

console.log(filteredArr(arr));
