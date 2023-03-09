     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="flex-container-column card">
            <div class="display">
                <h1 id="displayNumber">0</h1>
            </div>
            <div class="flex-container-row">
                <div class="button">7</div>
                <div class="button">8</div>
                <div class="button">9</div>
                <div class="button negative">+/-</div>
            </div>
            <div class="flex-container-row">
                <div class="button">4</div>
                <div class="button">5</div>
                <div class="button">6</div>
                <div class="button operator">-</div>
            </div>
            <div class="flex-container-row">
                <div class="button">1</div>
                <div class="button">2</div>
                <div class="button">3</div>
                <div class="button operator">+</div>
            </div>
            <div class="flex-container-row">
                <div class="button clear">CE</div>
                <div class="button">0</div>
                <div class="button equals double">=</div>   
            </div>
        </div>

        <div class="history card">
            <h2>Riwayat Perhitungan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Angka Pertama</th>
                        <th>Operator</th>
                        <th>Angka Kedua</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody id="historyList"></tbody>
            </table>
        </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>