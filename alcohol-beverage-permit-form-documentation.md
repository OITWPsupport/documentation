# Alcohol Beverage Permit Form Documentation

## Overview 
This form allows users to request permission from the university to hold an on-campus event at which alcohol is served. This request requires approval by several offices on campus, and finally by the State Board of Education.

## Submitting the Form
The form lives on the secureforms.boisestate.edu WordPress site. It is public facing and can be submitted by any unauthenticated user on or off campus. When the form is submitted, the submitter receives an email notification, and a workflow (executed by the Gravity Flow WordPress plugin) begins.

## Workflow Approval Steps
At each stage of the approval workflow, one or more users will receive an email notifying them that the form requires their review and action. That email contains a link to a page that displays pending requests, sorted by date submitted (descending).

### Workflow Actions
Each user in the workflow can take the following actions:
* **Approve** Approving the request sends it to the next step in the workflow.
* **Reject** Rejecting the request requires that the workflow user add a note explaining the rejection. This completes the workflow and notifies the form submitter. No one else in the workflow is notified.
* **Cancel Workflow** This changes the request status to “Cancelled.” No one else in the workflow is notified. The form submitter is not notified.
* **Restart Workflow** This requests approval from all workflow users, whether they’ve acted on this request already or not, starting with the Aramark Catering Manager.
* **Send to Step [workflow step]** This sends the request to any step in the workflow. The request can still progress all the way to approval. The workflow timeline will show all workflow steps that were approved (implying any that were skipped).

### Workflow Sequence
1. Approval Step 1 (Workflow Step #1: Aramark Catering Manager) 
2. Approval Step 2 (Workflow Step #2: Aramark Contract Manager)
3. Approval Step 3 (Workflow Step #3: Chief Operating Officer)
4. Approval Step 4 (Workflow Step #4: General Counsel)
5. Approval Step 5 (Workflow Step #5: President's Office) The notification email for this step includes an attached PDF summarizing the form submission and providing a space for the president’s signature. 

## Administration
The administrator of the application (Executive Assistant, Office of COO) has access to maintain the workflow and designate approvers at each step by adding and removing assignees. The administrator can also edit the text of the emails received by workflow users and form submitters.

## Receiving the PDF
When the request reaches Workflow Step #5, the email notification of that step will include a PDF attachment that contains all the data from the original form, as well as a space for the president’s signature. 
