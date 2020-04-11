       
<?php $POEM->Load_from_key(6); //load the correct patient record?>

<div class="modal fade docs-example-modal-lg" id="modal-POEM" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">

                    <div class="modal-content mc1 bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                        <div class="modal-header">
                            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                <div>
                                    <div class="bg-dark mr-3">
                                    <img src="<?php echo BASE_URL;?>/assets/logo/erm.png" id="navbar-logo" style="height: 50px;">

                                    </div>
                                </div>
                                <div class="text-left align-self-center">
                                    <h5 class="mb-0">Per Oral Endoscopic Myotomy (POEM) report</h5>
                                    <span class="mb-0"></span>
                                </div>

                            </div>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        

                        <div class="modal-body">

                            <div class="faculty-body">

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Procedure Date : <?php echo $POEM->getProcedureDate();?></p>
                                    <p class="text-white">Clinican : Dr David Tate</p>
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Indication : <?php echo $general->getValueText('diagnosis', $POEM->getdiagnosis(), 'valuesPOEM')?></p>
                                    
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Protocol</p>
                                    
                                        <!-- if there are any of entered then print 
                                    
                                    
                                    -->
                                    <?php
                                    $achalasiaFeatures = [];

                                    if ($POEM->getgastroscopy_prevdilated() == 1){
                                        $achalasiaFeatures['gastroscopy_prevdilated'] = 'a dilated oesophagus';
                                    }

                                    if ($POEM->getgastroscopy_prevresistance() == 1){
                                        $achalasiaFeatures['gastroscopy_prevresistance'] = 'resistance to GOJ passage with the endoscope';
                                    }

                                    

                                    if ($POEM->getgastroscopy_prevspasm() == 1){
                                        $achalasiaFeatures['gastroscopy_prevspasm'] = 'spasm of the oesophageal body';
                                    }

                                    if(!empty($achalasiaFeatures)){

                                        ?><p class="">The following features were present on inspection: <?php

                                        echo implode($achalasiaFeatures, ', ');

                                    }

                                     

                                    echo "</p>";?>

                                    <p class="">The gastro-oesophageal junction was located at <?php echo $POEM->getPOEM_GOJ_distance();?> cm from the incisors </p>
                                    <p class="">A submucosal tunnel was created in the <?php echo $POEM->getPOEM_incision_position();?> o'clock orientation at <?php echo $POEM->getPOEM_incision_distance();?> cm using submucosal injection and the (xx) knife</p>
                                    <p class="">Submucosal tunneling was performed from xx cm to yy cm </p>
                                    <p class="">A <?php echo $POEM->getPOEM_myotomy_length();?> cm myotomy was perfomed (full thickness for the distal yy cm)</p>
                                    <?php if ($POEM->getPOEM_complication() == 0){?>
                                    <p class="">There were no immediate adverse events</p>
                                    <?}?>
                                    <p class="">The tunnel was then closed with <?php echo $POEM->getPOEM_number_clips();?> endoscopic clips</p>
                                    <p class="">The procedure duration was <?php echo $POEM->getPOEM_duration_total();?> minutes</p>

                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Conclusion</p>
                                    <?php if ($POEM->getPOEM_complication() == 0){?>
                                        <p class="">Per-oral endoscopic myotomy performed without immediate complication</p>
                                    <?}?>
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-left">
                                    
                                    <p class="text-white">Post-procedure advice</p>
                                    <p class="">
                                        <ul>
                                            
                                        <li>Nil by mouth</li>
                                        <li>Contrast swallow tomorrow am</li>
                                        <li>Strictly no oral intake until contrast swallow result reviewed by consultant</li>
                                        <li>IV antibiotics (e.g. augmentin 1g qds and continue orally 625mg tds for 5 days on discharge)</li>
                                        <li>IV PPI (pantoprazole 40mg bd and continue orally on discharge)</li>
                                        <li>Follow up consultation 4-6 weeks</li>
                                        
                                    
                                    
                                    </ul>
                                    </p>

                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                            <p class="text-muted text-sm">Computers are not doctors.  Check this report manually.</p>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
            </div>

        </div>