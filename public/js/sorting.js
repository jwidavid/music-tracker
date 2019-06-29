'use strict';

let tableData = {};
let rowData = {};
let arr = [];
let colIndex = 0;

// Handles click event for table column headers
$('#sortable th').on('click', function() {
    tableData = document.getElementById('sortable').getElementsByTagName('tbody').item(0);
    rowData = tableData.getElementsByTagName('tr');
    arr = [...rowData];
    colIndex = $(this)[0].cellIndex;

    // check if the column is already sorted
    if (!isSorted(arr)) {
        // column not sorted - perform a merge sort
        arr = mergeSort(arr);
    }
    else {
        // column is already sorted - simply reverse the list
        arr.reverse();
    }
    for (let i=arr.length-1; i>-1; i--) {
        tableData.insertBefore(arr[i], tableData.childNodes[0]);
    }
});

// Handles click event for band filter
$('#bandFilter').on('change', function() {
    let bandIndex = 2; // hard coded as a setting due to scope of project
    tableData = document.getElementById('sortable').getElementsByTagName('tbody').item(0);
    rowData = tableData.getElementsByTagName('tr');
    arr = [...rowData];

    for (let i=0; i<arr.length; i++) {
        let var1 = $('#bandFilter option:selected').text();
        let var2 = $(arr[i]).children()[bandIndex].innerText;

        if (var1 !== var2 && var1 != '') {
            $(arr[i]).hide();
        }
        else {
            $(arr[i]).show();
        }
    }
})

// Returns true if table is already sorted
function isSorted(arr) {
    for (let i=0; i<arr.length-1; i++) {
        let var1 = $(arr[i]).children()[colIndex].innerText;
        let var2 = $(arr[i+1]).children()[colIndex].innerText;
        // Handles integer column values
        if (!isNaN(var1) && !isNaN(var2)) {
            var1 = Number(var1);
            var2 = Number(var2);
        }
        if (var1 > var2) {
            return false;
        }
    }
    return true;
}

// Split the array into halves and merge them recursively 
function mergeSort(arr) {
    if (arr.length === 1) {
      // return once we hit an array with a single item
      return arr;
    }
  
    const middle = Math.floor(arr.length / 2) // get the middle item of the array rounded down
    const left = arr.slice(0, middle) // items on the left side
    const right = arr.slice(middle) // items on the right side
  
    return merge(
       mergeSort(left),
       mergeSort(right)
    )
}
  
// Compares the arrays item by item and return the concatenated result
function merge(left, right) {
    let result = []
    let indexLeft = 0
    let indexRight = 0
  
    while (indexLeft < left.length && indexRight < right.length) {
        let var1 = $(left[indexLeft]).children()[colIndex].innerText;
        let var2 = $(right[indexRight]).children()[colIndex].innerText;

        // Handles numeric column values
        if (!isNaN(var1) && !isNaN(var2)) {
            var1 = Number(var1);
            var2 = Number(var2);
        }

        if (var1 < var2) {
            result.push(left[indexLeft])
            indexLeft++
        } 
        else {
            result.push(right[indexRight])
            indexRight++
        }
    }
    return result.concat(left.slice(indexLeft)).concat(right.slice(indexRight))
}
  