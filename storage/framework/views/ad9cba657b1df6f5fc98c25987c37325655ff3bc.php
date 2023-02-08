


<?php $__env->startSection('space-work'); ?>

<h2 class="mb-4">Exams</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExamModal">
Add Exam
</button>

  <!-- Modal -->
  <div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="addExam">
            <?php echo csrf_field(); ?>
              <div class="modal-body">
                   <input type="text" name="exam_name" placeholder="Enter Exam Name" class="w-100" required>
                   <br><br>
                   
                   <?php if(isset($subjects)): ?>
                   <pre><?php echo e(print_r($subjects, true)); ?></pre>
               <?php endif; ?>
               <select name="subjects_id" required class="w-100" >
                 dd($subjects); // Add this statement to check if the data is being displayed correctly
                 <option value="">Select Subject</option>
                 <?php if(isset($subjects) && count($subjects)>0): ?>
                   <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
               </select>

                    <br><br>
                    <input type="date" name="date" class="w-100" required min="<?php echo date ('Y-m-d');?>">
                    <br><br>
                    <input type="time" name="time" class="w-100" required>
                            
               
                   
             </div>
             <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Add</button>
            </div>
       </form>
      </div>
    </div>
  </div>

<script>

$(document).ready(function(){

$("#addExam").submit(function(e){
    e.preventDefault();
    var formData=$(this).serialize();

    $.ajax({

      url:"<?php echo e(route('addExam')); ?>",
      type:"POST",
      data:formData,
      success:function(data){
         if(data.success==true){

           location.reload();
         }
         else{
          alert(data.msg);
         }
      }

    });

});

});


</script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout/admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OAMS\resources\views/admin/exam-dashboard.blade.php ENDPATH**/ ?>