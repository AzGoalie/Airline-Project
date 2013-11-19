import javax.swing.UIManager;
import javax.swing.UIManager.LookAndFeelInfo;

public class WindowUtilities 
{
	public static void setNativeLookAndFeel() 
	{
		
		try {
		    for (LookAndFeelInfo info : UIManager.getInstalledLookAndFeels()) {
		        if ("Nimbus".equals(info.getName())) {
		            UIManager.setLookAndFeel(info.getClassName());
		            break;
		        }
		    }
		} catch (Exception e) {
		    // If Nimbus is not available, you can set the GUI to another look and feel.
		}
		
//		try
//		{
//			UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
//		}catch(Exception e)
//		{
//			System.out.println("Error setting native LAF: " + e);
//		}
		
	}
//UIManager.setLookAndFeel(UIManager.getCrossPlatformLookAndFeelClassName());
//UIManager.setLookAndFeel( "com.sun.java.swing.plaf.motif.MotifLookAndFeel");
}