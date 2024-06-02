// sorting table
!function() {
    function t(t, e) {
        for (; (t = t.parentElement) && !t.classList.contains(e););
        return t
    }

    function e(t) {
        return t = t.replace(/[^\d\.-]/g, ""), Number(t)
    }

    function n(t) {
        var e = document.createElement("span");
        return e.innerHTML = t, e.textContent || e.innerText
    }

    function r(t, e, n) {
        for (var r = 0; r < n.length; r++) r == e ? n[e].setAttribute("data-sort-direction", t) : n[r].setAttribute("data-sort-direction", 0)
    }

    function a(t, e) {
        for (var n = t.getElementsByTagName("tbody")[0].getElementsByTagName("tr"), r = 0; r < n.length; r++)
            for (var a = n[r].getElementsByTagName("td"), i = 0; i < a.length; i++) a[i].innerHTML = e[r][i]
    }
    window.addEventListener("load", function() {
        for (var i = document.getElementsByClassName("table"), o = [], s = 0; s < i.length; s++) ! function() {
            i[s].setAttribute("data-sort-index", s);
            for (var d = i[s].getElementsByTagName("tbody")[0].getElementsByTagName("tr"), l = 0; l < d.length; l++)
                for (var g = d[l].getElementsByTagName("td"), c = 0; c < g.length; c++) void 0 === o[s] && o.splice(s, 0, []), void 0 === o[s][l] && o[s].splice(l, 0, []), o[s][l].splice(c, 0, g[c].innerHTML);
            for (var u = i[s].getElementsByTagName("thead")[0].getElementsByTagName("tr")[0].getElementsByTagName("th"), m = 0; m < u.length; m++) ! function() {
                var s = u[m].classList.contains("table-header");
                u[m].setAttribute("data-sort-direction", 0), u[m].setAttribute("data-sort-index", m), u[m].addEventListener("click", function() {
                    var d = this.getAttribute("data-sort-direction"),
                        l = this.getAttribute("data-sort-index"),
                        g = t(this, "table").getAttribute("data-sort-index");
                    r(1 == d ? -1 : 1, l, u), o[g] = o[g].sort(function(t, r) {
                        var a = n(t[l]),
                            i = n(r[l]);
                        return s && (a = e(a), i = e(i)), a === i ? 0 : 1 == d ? a > i ? -1 : 1 : a < i ? -1 : 1
                    }), a(i[g], o[g])
                })
            }()
        }()
    })
}();

// search bar
document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById("searchInput");
    var searchButton = document.getElementById("searchButton");
    var tableBody = document.getElementById("info-table-body");
    var rows = tableBody.getElementsByTagName("tr");

    function filterTable() {
        var filter = searchInput.value.toLowerCase();
        var row, cells, cell, textValue;
        for (var i = 0; i < rows.length; i++) {
            row = rows[i];
            cells = row.getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < cells.length; j++) {
                cell = cells[j];
                if (cell) {
                    textValue = cell.textContent || cell.innerText;
                    if (textValue.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            if (found) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }

    searchButton.addEventListener("click", filterTable);
    searchInput.addEventListener("keyup", filterTable); // real-time search
});


function openTambahModal() {
    document.getElementById("modalFormTambah").style.display = "block";
  }

function closeTambahModal() {
    document.getElementById("modalFormTambah").style.display = "none";
}

function openEditModal(button) {
    var id = button.getAttribute('data-id'); // Mendapatkan nilai data-id dari tombol yang diklik
    document.getElementById('editId').value = id;
    document.getElementById("modalFormEdit").style.display = "block";
}
function closeEditModal() {
    document.getElementById("modalFormEdit").style.display = "none";
}

function openDeleteModal(button) {
    var id = button.getAttribute('data-id');
    document.getElementById('deleteId').value = id;
    document.getElementById("modalFormDelete").style.display = "block";
}
function closeDeleteModal() {
    document.getElementById("modalFormDelete").style.display = "none";
}

document.getElementById("formTambahBarang").addEventListener("submit", async function(event) {
    event.preventDefault();
    const namaBarang = document.getElementById("namaBarang").value;
    const quantityBarang = document.getElementById("quantityBarang").value;
    const hargaBarang = document.getElementById("hargaBarang").value;

    const response = await fetch('tambah_barang.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `namaBarang=${namaBarang}&quantityBarang=${quantityBarang}&hargaBarang=${hargaBarang}`
    });

    if (response.ok) {
      location.reload();
    } else {
      alert('Gagal menambah barang');
    }
});

document.getElementById("formEditBarang").addEventListener("submit", async function(event) {
    event.preventDefault();

    const id = document.getElementById("editId").value;
    const name = document.getElementById("editName").value;
    const quantity = document.getElementById("editQuantity").value;
    const price = document.getElementById("editPrice").value;
    const response = await fetch('edit_barang.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `id=${id}&name=${name}&quantity=${quantity}&price=${price}`
    });

    if (response.ok) {
      location.reload();
    } else {
      alert('Gagal mengedit barang');
    }
});

document.getElementById("formDeleteBarang").addEventListener("submit", async function(event) {
    event.preventDefault();

    const id = document.getElementById("deleteId").value;
    const response = await fetch('delete.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${id}`
      });

      if (response.ok) {
        window.location.reload();
      } else {
        console.error('Error deleting item');
      }
});
