<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Stats</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Total Users Registered <span class="float-right" id="registeredUsersValue">{{$registeredUsers}}</span></h4>
                <div class="progress mb-4">
                    <div id="registeredUsersProgressBar" class="progress-bar bg-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <h4 class="small font-weight-bold">Total menu price  <span class="float-right" id="totalPriceOfFoodValue">{{$totalPriceOfFood}}</span></h4>
                <div class="progress mb-4">
                    <div id="totalPriceOfFoodProgressBar" class="progress-bar bg-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <h4 class="small font-weight-bold">Total Booked tables <span class="float-right" id="bookedTablesValue">{{$bookedTables}}</span></h4>
                <div class="progress mb-4">
                    <div id="bookedTablesProgressBar" class="progress-bar bg-info" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <h4 class="small font-weight-bold">Messages <span class="float-right" id="messagesValue">{{$messages}}</span></h4>
                <div class="progress">
                    <div id="messagesProgressBar" class="progress-bar bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function updateProgressBar(progressBarId, value, maxValue) {
        var progressBar = document.getElementById(progressBarId);
        var percentage = (value / maxValue) * 100;
        progressBar.style.width = percentage + '%';
        progressBar.setAttribute('aria-valuenow', percentage);
    }
    updateProgressBar('registeredUsersProgressBar', {{$registeredUsers}}, 100);
    updateProgressBar('totalPriceOfFoodProgressBar', {{$totalPriceOfFood}}, 1000);
    updateProgressBar('bookedTablesProgressBar', {{$bookedTables}}, 50);
    updateProgressBar('messagesProgressBar', 10, 100);
</script>
