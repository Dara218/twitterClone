<x-layout>
    <div class="col-8 col-md-6">
        <div class="mb-3">
            <select class="form-select form-select-md py-2 bg-black text-white" name="month" id="" value="{{ old('month') }}">
                <option selected disabled>Month</option>
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
            </select>
        </div>
        @error('month')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="col-2 col-md-3">
        <div class="mb-3">
            <select class="form-select form-select-md py-2 bg-black text-white" name="day" id="" value="{{ old('day') }}">
                <option selected disabled>Day</option>
                    @for ($i = 1; $i < 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
        </div>
        @error('day')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="col-2 col-md-3">
        <div class="mb-3">
            <select class="form-select form-select-md py-2 bg-black text-white" name="year" id="" value="{{ old('year') }}">
                <option selected disabled>Year</option>
                @for ($i = 1903; $i < date('Y') + 1; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        @error('year')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
</x-layout>
