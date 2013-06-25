<div class="container">
	<div class="intro">
		<h4>Highly-Influential Scientist: <!-- researcher --><!-- /researcher --></h4>
		<p>
			The purpose of this survey is to explore different dimensions of impact among highly cited papers. We have invited only a few hundred of the most highly influential scientists in biomedical fields to participate in this work. We very much appreciate your willingness to complete this survey.
		</p>
		<p>
			Below you will find listed 10 of your high impact articles published between 2005 and 2008. You will also find listed six features related to the nature of impact, influence and innovation, each with a definition. Please rate each of your papers below on each feature using the 0-100 scale, which is also shown below.
		</p>
		<p>
			If you have questions about this survey, please contact John Ioannidis (<a href="mailto:jioannid@stanford.edu">jioannid@standord.edu</a>). 
		</p>
	</div>
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
	<div class="survey">
		<form method="post">
			<table class="table survey-header-table">
				<thead>
					<!-- thead_row -->
					<tr>
						<th colspan="2">&nbsp;</th>
						<!-- question_title -->
						<th class="question-title"><!-- question --><!-- /question --></th>
						<!-- /question_title -->
						<th class="spacer">&nbsp;</th>
					</tr>
					<!-- /thead-row -->
					<tr>
						<th>&nbsp;</th>
						<th>Example of scores for an article</th>
						<th class="example-score">20</th>
						<th class="example-score">90</th>
						<th class="example-score">30</th>
						<th class="example-score">60</th>
						<th class="example-score">15</th>
						<th class="example-score">55</th>
						<th class="spacer">&nbsp;</th>
					</tr>
				</thead>

			</table>
			<table class="table survey-table">
				<tbody>
					<!-- source -->
					<tr>
						<td><!-- ord --><!-- /ord --></td>
						<td><!-- title --><!-- /title --></td>
						<!-- response -->
						<td class="response"><input class="response" type="number" value="<!-- value --><!-- /value -->" min="<!-- lo_response --><!-- /lo_response -->" max="<!-- hi_response --><!-- /hi_response -->" name="<!-- input --><!-- /input -->" /></td>
						<!-- /response -->
					</tr>
					<!-- /source -->
					<tr>
						<td>&nbsp;</td>
						<td colspan="7">
							Is your most important paper published
							between 2005 and 2008 in the list of
							10 above?
							<input type="radio" class="radio" id="hide-addl-source" name="hide-addl-source" value="yes"> Yes
							<input type="radio" class="radio" id="show-addl-source" name="hide-addl-source" value="no"> No
						</td>
					</tr>
					<tr class="addl-source">
						<td>&nbsp;</td>
						<td colspan="7">
							Please add the reference for your most important paper published between 2005 and 2008 and rate it using the same features and scale.
						</td>
					</tr>
					<tr class="addl-source">
						<td><!-- ord_plus_1 --><!-- /ord_plus_1 --></td>
						<td>
							<textarea name="addl-source"><!-- addl_source --><!-- /addl_source --></textarea>
						</td>
						<!-- addl_response -->
						<td class="response">
							<input class="response addl-response" type="number" value="<!-- value --><!-- /value -->" min="<!-- lo_response --><!-- /lo_response -->" max="<!-- hi_response --><!-- /hi_response -->" name="<!-- input --><!-- /input -->" />
						</td>
						<!-- /addl_response -->
					</tr>
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
