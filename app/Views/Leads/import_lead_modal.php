<!-- Import Modal -->
<div class="modal fade" id="leadModelImport" tabindex="-1" role="dialog" aria-labelledby="leadModelImportLabel" 
  aria-hidden="true ">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="leadModelImportLabel">Import Lead</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="alertMessage"></div>
            </div>

            <div class="modal-body">
                <form class="forms-sample" id="import_form">
                    <input type="hidden" name="username" value="<?php echo $session->get('loginInfo')['full_name'];?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <span class="text-danger"><strong>Only CSV file is allowed. Please check demo file before upload.</strong></span><br>
                            <!-- <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_csv">
                                <label class="custom-file-label"></label>
                            </div> -->
                            <input name="file_csv" class="form-control" type="file" id="file_csv" accept=".csv" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="importCourseVaue">Course</label>
                                <select class="form-control" id="importCourseVaue" name="importCourseVaue">
                                    <option value="">Select</option>
                                    <?php if (!empty($courseName)) : ?>
                                        <?php foreach ($courseName as $course_name) : ?>
                                            <option value="<?= $course_name['id'] ?>"><?= $course_name['title'] ?></option>
                                        <?php endforeach;
                                        else : ?>
                                            <option value="">Not Found</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="subcategory">Sub Category</label>
                                <select class="form-control" id="subcategory1" name="subcategory1">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row" style="margin-right: auto;">
                    Click Here :
                    <a href="<?php echo base_url('file/Lead_demo_file.csv') ?>" download="<?php echo 'lead_demo_' . rand() . '_file.csv'; ?>"> Download Sample File</a>
                </div>
                <button type="button" class="btn" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>