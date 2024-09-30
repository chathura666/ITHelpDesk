<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>



<head>
    
    <style>
        /* CSS for file icons */
        .file-icon {
            width: 24px; /* Adjust icon size as needed */
            height: 24px; /* Adjust icon size as needed */
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="content-body">
    <br><br>
    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>FAQ Panel</h3>
                                <br>
                                <div class="bootstrap-media">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                        <img src="<?php echo base_url('icons/pdf-icon.png'); ?>" class="file-icon">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1"><a href="<?php echo base_url('FAQ/test.pdf'); ?>">DMS Guide</a></h5>Document Management & Workflow Automation System.Manage critical workflows in BOC such as Loans Creation, Account Opening etc.Workflow Automation System (WAS) will be used to automate workflows (processes) in the Bank</div>
                                        </li>
                                        <li class="media my-4">
                                            <img  class="file-icon" src="<?php echo base_url('icons/pdf-icon.png'); ?>" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1"><a href="<?php echo base_url('FAQ/Lotus Traveler Installation Guide V2.1.pdf'); ?>">Lotus Traveler Installation Guide</a></h5>Lotus Traveler is an IBM software solution that enables mobile access to IBM Notes email, calendar, and contacts</div>
                                        </li>
                                        <li class="media my-4">
                                            <img  class="file-icon" src="<?php echo base_url('icons/pdf-icon.png'); ?>" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1"><a href="<?php echo base_url('FAQ/ipad mail configuration.pdf'); ?>">Ipad mail configuration</a></h5>Lotus Traveler is an IBM software solution that enables mobile access to IBM Notes email, calendar, and contacts</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
  

<?= $this->endSection() ?>