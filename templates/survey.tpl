<div class="container">
	<div class="definitions">
		<h4>Definitions:</h4>
		<dl> 
			<!-- definition_item -->
			<dt><!-- term --><!-- /term --></dt>
			<dd><!-- definition --><!-- /definition --></dd>
			<!-- /definition_item -->
		</dl>
	</div>
	<div class="scale">
		<h4>Scale:</h4>
		<table class="table">
			<thead>
				<tr>
					<th>Continuous Scale</th>
					<th>0</th>
					<th>25</th>
					<th>50</th>
					<th>75</th>
					<th>100</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>&nbsp;</td>
					<td class="scale-def">Not at all</td>
					<td class="scale-def">Modest</td>
					<td class="scale-def">Substantial</td>
					<td class="scale-def">Prominent</td>
					<td class="scale-def">Complete</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="researcher">
		<h4>Highly-Influential Scientist: <!-- researcher --><!-- /researcher --></h4>
	</div>
	<div class="survey">
		<form method="post">
			<table class="table">
				<thead>
					<tr>
						<th colspan="2">
							Survey: Please rate your papers below on each feature using the 0-100 scale.
							Please add and rate what you consider to be your most important paper (2005-2008) at the bottom if it is missing from the list.
						</th>
						<!-- question_title -->
						<th class="question-title"><!-- question --><!-- /question --></th>
						<!-- /question_title -->
					</tr>
					<tr>
						<th>&nbsp;</th>
						<th>Example of scores for an article</th>
						<th class="example-score">20</th>
						<th class="example-score">90</th>
						<th class="example-score">30</th>
						<th class="example-score">60</th>
						<th class="example-score">15</th>
						<th class="example-score">55</th>
					</tr>
				</thead>
				<tbody>
					<!-- source -->
					<tr>
						<td><!-- ord --><!-- /ord --></td>
						<td><!-- title --><!-- /title --></td>
						<!-- response -->
						<td class="response"><input class="response" type="number" value="<!-- value --><!-- /value -->" min="0" max="100" name="<!-- input --><!-- /input -->" /></td>
						<!-- /response -->
					</tr>
					<!-- /source -->
				</tbody>
			</table>
			<div class="submit">
				<button class="btn btn-large btn-primary" type="submit">Submit</button>
			</div>
		</form>
	</div>
</div>
<div class="modal hide fade" id="success-modal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Thank You</h3>
	</div>
	<div class="modal-body">
		<p>
			Thank you for taking our survey.
			We have saved your responses.
			You may revisit and update your responses whenever you like.
		</p>
	</div>
	<div class="modal-footer">
		<a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Close</a>
		<a href="<!-- home_url --><!-- /home_url -->" class="btn btn-success">Leave Survey</a>
	</div>
</div>
<div class="modal hide fade" id="failure-modal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>An error has occurred</h3>
	</div>
	<div class="modal-body">
		<p class="alert alert-danger">An error has occurred. Please contact us.</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
	</div>
</div>
