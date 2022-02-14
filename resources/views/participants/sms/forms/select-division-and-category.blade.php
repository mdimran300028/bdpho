<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <select class="form-control select2" name="division_id" required>
                <option value="">Select Division </option>
                @foreach(divisions() as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <select class="form-control select2" name="category_id" required>
                <option value="">Select Category </option>
                @foreach(categories() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                <option value="all">All Categories</option>
            </select>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="row">
            <div class="col-md-12">
                <button type="button" onclick="getParticipantList()" class="btn btn-block btn-primary">Get List</button>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <select class="form-control select2" name="sms_type" required>
                <option value="">SMS Type </option>
                <option value="1">Send Reg. No.</option>
                <option value="2">Custom Message</option>
            </select>
        </div>
    </div>

    <div class="col-12">
        <textarea class="form-control" name="message" placeholder="Write message here......." style="display: none"></textarea>
    </div>
</div>

<script>
    $("select[name=sms_type]").change(function () {
      if ($(this).val()==2){$("textarea[name=message]").show();}
      else {$("textarea[name=message]").hide();}
    });
</script>
